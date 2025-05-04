<?php

declare(strict_types=1);

namespace Src\Payment\Application\Ports;

use Src\Payment\Application\Dtos\Inputs\CreatePaymentInput;

interface CreatePaymentPort
{
    public function handle(CreatePaymentInput $input): void;
}