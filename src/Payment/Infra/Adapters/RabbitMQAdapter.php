<?php

declare(strict_types=1);

namespace Src\Payment\Infra\Adapters;

use InvalidArgumentException;
use Log;
use Src\Payment\Application\Ports\PublishPaymentPort;
use Src\Payment\Domain\Entities\Payment;
use Src\Payment\Domain\Enums\PaymentTypeEnum;

final class RabbitMQAdapter implements PublishPaymentPort
{
    public function publish(Payment $payment): void
    {
        match ($payment->type) {
            PaymentTypeEnum::PIX => Log::info("Pix"),
            PaymentTypeEnum::BANK_SLIP => Log::info(""),
            PaymentTypeEnum::CREDIT_CARD => Log::info(""),
            default => throw new InvalidArgumentException("Invalid payment type")
        };
    }
}