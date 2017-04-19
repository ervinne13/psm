<?php

use App\Models\Module;
use App\Models\ModuleGroup;
use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="User & Security Modules">

        $securityModules = [
            ["code" => "UA", "display_name" => "User Accounts"],
            ["code" => "RL", "display_name" => "Roles"],
            ["code" => "ACL", "display_name" => "Access Control List"],
        ];

        Module::insert($securityModules);

        // </editor-fold>

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Payroll Modules">

        $payrollModules = [
            ["code" => "PAY_ENTS", "display_name" => "Payroll Entries"],
            ["code" => "PAY_PROC", "display_name" => "Payroll Process"],
        ];

        Module::insert($payrollModules);

        // </editor-fold>

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Timekeeping Modules">

        $timekeepingModules = [
            ["code" => "EMP_TE", "display_name" => "Employee Time Entries"]
        ];

        Module::insert($timekeepingModules);

        // </editor-fold>

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Employee Self Service Modules">

        $ESSModules = [
            ["code" => "SS_WSCHED", "display_name" => "Work Schedule Adjs."],
            ["code" => "OT_REQ", "display_name" => "Overtime Request"],
            ["code" => "LV_REQ", "display_name" => "Leave Request"],
        ];

        Module::insert($ESSModules);

        // </editor-fold>

        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Report Modules">

        $reportModules = [
            ["code" => "PAY_SLP", "display_name" => "Payslip"],
            ["code" => "BNK_REMIT", "display_name" => "Bank Remittance"],
            ["code" => "CASH_PAY", "display_name" => "Cash Payables"],
            ["code" => "PHLTH_PAY", "display_name" => "Philhealth Payables"],
            ["code" => "SSS_PAY", "display_name" => "SSS Payables"],
            ["code" => "TAX_PAY", "display_name" => "Tax Withheld Payables"]
        ];

        Module::insert($reportModules);

        // </editor-fold>


        /**         * ***************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Master File Modules">

        $SYSMasterFileModules = [
            ["code" => "NS", "display_name" => "Number Series"],
            ["code" => "COM", "display_name" => "Company"],
            ["code" => "LOC", "display_name" => "Location"],
            ["code" => "BNK", "display_name" => "Bank"]
        ];

        Module::insert($SYSMasterFileModules);

        $HRMasterFileModules = [
            ["code" => "EMP", "display_name" => "Employee"],
            ["code" => "PLCY", "display_name" => "Policy"],
            ["code" => "HOL", "display_name" => "Holiday"],
            ["code" => "SHFT", "display_name" => "Shift"],
            ["code" => "WORK_SCHED", "display_name" => "Work Schedule"]
        ];

        Module::insert($HRMasterFileModules);

        $PayrollMasterFileModules = [
            ["code" => "PAY_ITEMS", "display_name" => "Payroll Items"],
            ["code" => "TAX_CAT", "display_name" => "Tax Categories"],
            ["code" => "TAX_TBL", "display_name" => "Tax Table"],
            ["code" => "SSS_TBL", "display_name" => "SSS Table"],
            ["code" => "PHLTH_TBL", "display_name" => "Philhealth Table"]
        ];

        Module::insert($PayrollMasterFileModules);

        // </editor-fold>
    }

}
