<?php

declare(strict_types=1);

namespace Src\Payment\Infra\Models;
use Illuminate\Database\Eloquent\Model;
use Src\Payment\Domain\Enums\PaymentStatusEnum;
use Src\Payment\Domain\Enums\PaymentTypeEnum;

final class PaymentModel extends Model
{
    protected $table = "payments";

    protected $fillable = [
        "amount",
        "user_id",
        "type",
        "status",
        "created_at",
    ];

    protected $casts = [
        "type" => PaymentTypeEnum::class,
        "status" => PaymentStatusEnum::class,
    ];
}