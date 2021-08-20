<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Lists extends Enum
{
    public static $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    public static $modes = [
        1 => 'Shopping', 
        2 => 'Small Value Procurement', 
        3 => 'Public Bidding'
    ];

    public static $extensions = [
        1 => 'Jr.', 
        2 => 'Sr.', 
        3 => 'I',
        4 => 'II',
        5 => 'III',
        6 => 'IV',
        7 => 'V',
    ];
}
