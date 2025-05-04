<?php

declare(strict_types=1);

namespace Src\Payment\Application\Dtos\Inputs;

use Src\Payment\Domain\Enums\PaymentTypeEnum;
use Src\User\Domain\Entities\User;

final class CreatePaymentInput
{
    public User $user;
    public int $amount;
    public PaymentTypeEnum $type;

    public function __construct(User $user, int $amount, PaymentTypeEnum $type)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->type = $type;
    }
}