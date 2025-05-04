<?php

declare(strict_types=1);

namespace Src\Payment\Domain\Entities;

use Src\Payment\Domain\Enums\PaymentStatusEnum;
use Src\Payment\Domain\Enums\PaymentTypeEnum;
use Src\User\Domain\Entities\User;

final class Payment
{
    public ?int $id = null;
    public int $amount = 0;
    public int $userId;
    public PaymentTypeEnum $type;
    public ?PaymentStatusEnum $status = PaymentStatusEnum::PENDING;
    public function __construct(int $amount = 0, int $userId, PaymentTypeEnum $type, ?PaymentStatusEnum $status = PaymentStatusEnum::PENDING, ?int $id = null)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->userId = $userId;
        $this->type = $type;
        $this->status = $status;
    }
}