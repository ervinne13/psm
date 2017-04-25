<?php

namespace App\Payroll\Enum;

use App\StandardizationHelpers\BasicEnum;

/**
 * Description of HolidayType
 *
 * @author ervinne
 */
abstract class HolidayType extends BasicEnum {

    const REGGULAR = "REG";
    const SPECIAL  = "SPC";

}
