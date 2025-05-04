<?php

namespace Src\Payment\Domain\Enums;

enum PaymentTypeEnum: string
{
    case PIX = "pix";
    case CREDIT_CARD = "credit_card";
    case BANK_SLIP = "bank_slip";
}