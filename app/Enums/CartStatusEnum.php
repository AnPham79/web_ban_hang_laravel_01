<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class CartStatusEnum extends Enum
{
    public const GIO_HANG = 0;
    public const DA_MUA = 1;
    public const DA_HUY = 2;
}
