<?php

declare(strict_types=1);

namespace Src\Payment\Infra\Repositories;

use Log;
use Src\Payment\Domain\Entities\Payment;
use Src\Payment\Domain\Repositories\PaymentRepository;
use Src\Payment\Infra\Models\PaymentModel;

final class PaymentRepositoryImpl implements PaymentRepository
{
    private PaymentModel $model;

    public function __construct()
    {
        $this->model = new PaymentModel();
    }

    public function save(Payment $payment): Payment
    {
        $paymentCreation = $this->model->create([
            "amount" => $payment->amount,
            "status" => $payment->status,
            "type" => $payment->type,
            "user_id" => $payment->userId
        ]);

        return new Payment(
            $paymentCreation->amount,
            $paymentCreation->user_id,
            $paymentCreation->type,
            $paymentCreation->status,
            $paymentCreation->id
        );
    }

    public function updateStatus(Payment $payment): Payment
    {
        if ($payment->id === null) {
            throw new \Exception("Missing payment id");
        }

        $this->model->where('id', $payment->id)->update([
            "status" => $payment->status
        ]);

        return $payment;
    }
}