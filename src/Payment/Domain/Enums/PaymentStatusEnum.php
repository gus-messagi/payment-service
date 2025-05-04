<?php

namespace Src\Payment\Domain\Enums;

enum PaymentStatusEnum: string
{
    case PENDING = "pending";
    case PROCESSING = "processing";
    case DENIED = "denied";
    case APPROVED = "approved";
}