<?php

namespace App\Payroll\Enum;

use App\StandardizationHelpers\BasicEnum;

/**
 * Description of OvertimeType
 *
 * @author ervinne
 */
abstract class OvertimeType extends BasicEnum {

    const REGULAR                       = "ROT";
    const REST_DAY                      = "RDOT";
    const HOLIDAY                       = "HOT";
    const SPECIAL_HOLIDAY               = "SHOT";
    const REST_DAY_HOLIDAY              = "RDHOT";
    const REST_DAY_SPECIAL_HOLIDAY      = "RDSHOT";
    // differential counterparts
    const REGULAR_DIFF                  = "ROT_D";
    const REST_DAY_DIFF                 = "RDOT_D";
    const HOLIDAY_DIFF                  = "HOT_D";
    const SPECIAL_HOLIDAY_DIFF          = "SHOT_D";
    const REST_DAY_HOLIDAY_DIFF         = "RDHOT_D";
    const REST_DAY_SPECIAL_HOLIDAY_DIFF = "RDSHOT_D";

}
