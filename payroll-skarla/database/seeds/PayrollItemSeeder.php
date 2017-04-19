<?php

use App\Models\Payroll\PayrollItem;
use Illuminate\Database\Seeder;

class PayrollItemSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // <editor-fold defaultstate="collapsed" desc="Required Deductions">

        $requiredDeductions = [
            ["code" => "SYS_D_WHT", "display_name" => "Tax Withheld", "payslip_display_name" => "Tax Withheld"],
            ["code" => "SYS_D_SSS", "display_name" => "SSS", "payslip_display_name" => "SSS"],
            ["code" => "SYS_D_PHLTH", "display_name" => "Philhealth", "payslip_display_name" => "Philhealth"],
        ];


        for ($i = 0; $i < count($requiredDeductions); $i ++) {
            $requiredDeductions[$i]["type_code"]       = "D";
            $requiredDeductions[$i]["taxable"]         = true;
            $requiredDeductions[$i]["system_reserved"] = true;
            $requiredDeductions[$i]["computation_uom"] = "EA";

            $requiredDeductions[$i]["is_employee_amount_required"] = true;
        }

        PayrollItem::insert($requiredDeductions);

        // </editor-fold>

        /**         * ******************************************************* */
        // <editor-fold defaultstate="collapsed" desc="Standard Variable Deductions">
        $standardVariableDeductions = [
            ["code" => "SYS_D_LU", "display_name" => "Lates & Undertimes", "payslip_display_name" => "Tardiness", "amount_dependent_on_variable" => "minute_rate", "qty_dependent_on_variable" => "minutes_late", "divider" => 1],
            ["code" => "SYS_D_HDA", "display_name" => "Half Day Absences", "payslip_display_name" => "Tardiness", "amount_dependent_on_variable" => "daily_rate", "qty_dependent_on_variable" => "half_day_absent_count", "divider" => 2],
            ["code" => "SYS_D_ABS", "display_name" => "Absences", "payslip_display_name" => "Absences", "amount_dependent_on_variable" => "daily_rate", "qty_dependent_on_variable" => "absent_day_count", "divider" => 1],
        ];

        for ($i = 0; $i < count($standardVariableDeductions); $i ++) {
            $standardVariableDeductions[$i]["type_code"]       = "D";
            $standardVariableDeductions[$i]["taxable"]         = true;
            $standardVariableDeductions[$i]["system_reserved"] = true;
            $standardVariableDeductions[$i]["computation_uom"] = "MIN";

            $standardVariableDeductions[$i]["is_employee_amount_required"] = false;
        }

        PayrollItem::insert($standardVariableDeductions);

        // </editor-fold>

        /**         * ******************************************************* */
        // <editor-fold defaultstate="collapsed" desc="Standard Taxable Variable Hourly Earnings">

        $standardTaxableVariableHourlyEarnings = [
            ["code" => "SYS_D_ROT", "display_name" => "Regular Overtime", "payslip_display_name" => "Overtimes", "amount_dependent_on_variable" => "hourly_rate", "qty_dependent_on_variable" => "minutes_overtime", "multiplier" => 1],
            [
                "code"                         => "SYS_E_RDOT",
                "display_name"                 => "Rest Day Overtime",
                "payslip_display_name"         => "Overtimes",
                "amount_dependent_on_variable" => "hourly_rate",
                "qty_dependent_on_variable"    => "minutes_overtime",
                "multiplier"                   => 1.3
            ],
            [
                "code"                         => "SYS_E_RHOT",
                "display_name"                 => "Regular Holiday Overtime",
                "payslip_display_name"         => "Overtimes",
                "amount_dependent_on_variable" => "hourly_rate",
                "qty_dependent_on_variable"    => "minutes_overtime",
                "multiplier"                   => 2.6
            ],
            [
                "code"                         => "SYS_E_RRHOT",
                "display_name"                 => "Rest Day Regular Holiday Overtime",
                "payslip_display_name"         => "Overtimes",
                "amount_dependent_on_variable" => "hourly_rate",
                "qty_dependent_on_variable"    => "minutes_overtime",
                "multiplier"                   => 3.9
            ],
            [
                "code"                         => "SYS_E_SHOT",
                "display_name"                 => "Special Holiday Overtime",
                "payslip_display_name"         => "Overtimes",
                "amount_dependent_on_variable" => "hourly_rate",
                "qty_dependent_on_variable"    => "minutes_overtime",
                "multiplier"                   => 1.69
            ],
            [
                "code"                         => "SYS_E_RSHOT",
                "display_name"                 => "Rest Day Special Holiday Overtime",
                "payslip_display_name"         => "Overtimes",
                "amount_dependent_on_variable" => "hourly_rate",
                "qty_dependent_on_variable"    => "minutes_overtime",
                "multiplier"                   => 1.95
            ],
        ];

        for ($i = 0; $i < count($standardTaxableVariableHourlyEarnings); $i ++) {
            $standardTaxableVariableHourlyEarnings[$i]["type_code"]       = "E";
            $standardTaxableVariableHourlyEarnings[$i]["taxable"]         = true;
            $standardTaxableVariableHourlyEarnings[$i]["system_reserved"] = true;
            $standardTaxableVariableHourlyEarnings[$i]["computation_uom"] = "HR"; // will convert min based variables to hour

            $standardTaxableVariableHourlyEarnings[$i]["is_employee_amount_required"] = false;
        }

        PayrollItem::insert($standardTaxableVariableHourlyEarnings);

        // </editor-fold>

        /**         * ******************************************************* */
        // <editor-fold defaultstate="collapsed" desc="Allowances">

        $allowances = [
            [
                "code"                        => "SYS_E_TALW",
                "display_name"                => "Taxable Allowance",
                "type_code"                   => "E",
                "computation_uom"             => "EA",
                "payslip_display_name"        => "Allowances",
                "system_reserved"             => true,
                "taxable"                     => true,
                "is_employee_amount_required" => true,
            ],
            [
                "code"                        => "SYS_E_COLA",
                "display_name"                => "COLA",
                "type_code"                   => "E",
                "computation_uom"             => "EA",
                "payslip_display_name"        => "Allowances",
                "system_reserved"             => true,
                "taxable"                     => false,
                "is_employee_amount_required" => true,
            ],
        ];

        PayrollItem::insert($allowances);

        // </editor-fold>

        /**         * ******************************************************* */
        // <editor-fold defaultstate="collapsed" desc="Custom Qty Computation Items">

        $customComputationItems = [
            [
                "code"                         => "SYS_E_NDIFF",
                "display_name"                 => "Night Differential",
                "type_code"                    => "E",
                "computation_uom"              => "HR",
                "payslip_display_name"         => "Overtime",
                "is_employee_amount_required"  => false,
                "amount_dependent_on_variable" => "hourly_rate",
                "qty_dependent_on_variable"    => "script_computed",
                "system_reserved"              => true,
                "taxable"                      => true,
            ]
        ];

        PayrollItem::insert($customComputationItems);

        // </editor-fold>

        /**         * ******************************************************* */
        // <editor-fold defaultstate="collapsed" desc="Adjustment Entries">

        $adjustmentEntries = [
            [
                "code"                        => "SYS_E_IADJ",
                "display_name"                => "Income Adjustment",
                "type_code"                   => "E",
                "computation_uom"             => "EA",
                "payslip_display_name"        => "Adjustments",
                "is_employee_amount_required" => false,
                "system_reserved"             => true,
                "taxable"                     => false,
            ],
            [
                "code"                        => "SYS_E_DADJ",
                "display_name"                => "Deduction Adjustment",
                "type_code"                   => "D",
                "computation_uom"             => "EA",
                "payslip_display_name"        => "Adjustments",
                "is_employee_amount_required" => false,
                "system_reserved"             => true,
                "taxable"                     => false,
            ],
        ];

        PayrollItem::insert($adjustmentEntries);

        // </editor-fold>
    }

}
