<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProcurementMode extends Enum
{
    public static $modes = ['Shopping', 'Small Value Procurement', 'Public Bidding'];
}
