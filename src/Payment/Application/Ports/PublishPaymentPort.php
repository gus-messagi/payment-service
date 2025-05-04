<?php

declare(strict_types=1);

namespace Src\Payment\Application\Ports;

use Src\Payment\Domain\Entities\Payment;

interface PublishPaymentPort
{
    public function publish(Payment $payment): void;
}