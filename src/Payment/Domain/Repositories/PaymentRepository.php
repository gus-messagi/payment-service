<?php

declare(strict_types=1);

namespace Src\Payment\Domain\Repositories;

use Src\Payment\Domain\Entities\Payment;

interface PaymentRepository
{
    public function save(Payment $payment): Payment;
    public function updateStatus(Payment $payment): Payment;
}