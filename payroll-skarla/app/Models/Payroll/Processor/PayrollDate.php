<?php

namespace App\Models\Payroll\Procssor;

use App\Payroll\Enum\HolidayType;
use DateTime;

/**
 * Description of PayrollDate
 *
 * Time Format: ISO 8601
 * 
 * @author ervinne
 */
class PayrollDate {

    /** @var DateTime  */
    public $date;

    /** @var HolidayType */
    public $holidayType     = NULL;
    public $isRestDay       = FALSE;
    public $requiredTimeIn  = NULL;
    public $requiredTimeOut = NULL;
    public $breaktTimeOut1  = NULL;
    public $breaktTimeIn1   = NULL;

}
