<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class InvoiceStatusEnum extends Enum
{
    public const CHO_XAC_NHAN = 0;
    public const DA_XAC_NHAN = 1;
    public const DANG_GIAO = 2;
    public const DA_NHAN = 3;
    public const DA_HUY = 4;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::CHO_XAC_NHAN:
                return 'Chờ xác nhận';
            case self::DA_XAC_NHAN:
                return 'Đã xác nhận';
            case self::DANG_GIAO:
                return 'Đang giao';
            case self::DA_NHAN:
                return 'Đã nhận';
            case self::DA_HUY:
                return 'Đã hủy';
            default:
                return parent::getDescription($value);
        }
    }
}
