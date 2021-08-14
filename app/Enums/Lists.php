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
    public static $modes = [1 => 'Shopping', 2 => 'Small Value Procurement', 3 => 'Public Bidding'];
    public static $categories = [1 => 'Office Supplies', 2 => 'ICT Software and Equipments', 3 => 'IT Repair and Maintenance', 4 => 'Furniture and Fixtures'];
    public static $uom = [1 => 'meter', 
                            2 => 'box', 
                            3 => 'bottle', 
                            4 => 'roll',
                            5 => 'unit',
                            6 => 'pc',
                            7 => 'pcs',
                            8 => 'ream',
                            9 => 'doz',
                            10 => 'set',
                            11 => 'length',
                            12 => 'pack',];
}
