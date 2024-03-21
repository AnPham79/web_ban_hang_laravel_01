<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class InvoiceStatusEnum extends Enum
{
    public const CHO_XAC_NHAN = 0;
    public const DA_XAC_NHAN = 1;
    public const DANG_GIAO = 2;
    public const DA_NHAN = 3;
}
