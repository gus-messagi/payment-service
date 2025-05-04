<?php

declare(strict_types=1);

namespace Src\Payment\Application\UseCases;

use Log;
use Src\Payment\Application\Dtos\Inputs\CreatePaymentInput;
use Src\Payment\Application\Ports\CreatePaymentPort;
use Src\Payment\Application\Ports\PublishPaymentPort;
use Src\Payment\Domain\Entities\Payment;
use Src\Payment\Domain\Enums\PaymentStatusEnum;
use Src\Payment\Domain\Enums\PaymentTypeEnum;
use Src\Payment\Domain\Repositories\PaymentRepository;
use Src\Payment\Infra\Adapters\RabbitMQAdapter;
use Src\Payment\Infra\Repositories\PaymentRepositoryImpl;

final class CreatePaymentUseCase implements CreatePaymentPort
{
    private PaymentRepository $repository;
    private PublishPaymentPort $publishPaymentPort;
    public function __construct(PaymentRepositoryImpl $repository, RabbitMQAdapter $rabbitMQAdapter)
    {
        $this->repository = $repository;
        $this->publishPaymentPort = $rabbitMQAdapter;
    }
    public function handle(CreatePaymentInput $input): void
    {
        $payment = new Payment($input->amount, $input->user->id, $input->type);
        $paymentCreated = $this->repository->save($payment);

        try {
            $this->publishPaymentPort->publish($paymentCreated);
            $paymentCreated->status = PaymentStatusEnum::PROCESSING;

            $this->repository->updateStatus($paymentCreated);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}