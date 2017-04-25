<?php

namespace App\Payroll\Services\AccessControlList;

use Illuminate\Support\Facades\Auth;

/**
 * Description of ModuleACLService
 *
 * @author ervinne
 */
class ModuleACLService {

    /**
     * TODO: put this in a configuration file
     * @var array
     */
    protected $moduleOrder = [
        [
            "icon"    => "fa-dollar",
            "name"    => "Payroll",
            "modules" => [
                ["code" => "PAY_ENTS", "name" => "Payroll Entries", "icon" => "fa-file-o", "url" => "payroll/entries"],
                ["code" => "PAY_PROC", "name" => "Payroll Process", "icon" => "fa-forward", "url" => "payroll/process"],
            ]
        ],
        [
            "icon"    => "fa-clock-o",
            "name"    => "Timekeeping",
            "modules" => [
                ["code" => "EMP_TE", "name" => "Employee Time Entries", "icon" => "fa-clock-o", "url" => "timekeeping/employee-time-entries"],
                ["code" => "EMP_TEC", "name" => "Time Entry Correction", "icon" => "fa-calendar-check-o", "url" => "timekeeping/employee-time-entry-corrections"],
            ]
        ],
        [
            "icon"    => "fa-cubes",
            "name"    => "Employee Self Service",
            "modules" => [
                ["code" => "SS_WSCHED", "name" => "Work Schedule", "icon" => "fa-calendar", "url" => "HRIS/work-schedule/setup"],
                ["code" => "OT_REQ", "name" => "Overtime Request", "icon" => "fa-clock-o", "url" => "HRIS/overtime"],
                ["code" => "LV_REQ", "name" => "Leave Request", "icon" => "fa-calendar-times-o", "url" => "HRIS/leave-request"],
            ]
        ],
        [
            "icon"    => "fa-file-text-o",
            "name"    => "Reports",
            "modules" => [
                ["code" => "REP_PAY_SLP", "name" => "Payslip", "icon" => "fa-file-o", "url" => "reports/payslips"],
                ["code" => "REP_BNK_REMIT", "name" => "Bank Remittance", "icon" => "fa-bank", "url" => "reports/bank-remittance"],
                ["code" => "REP_CASH_PAY", "name" => "Cash Payables", "icon" => "fa-money", "url" => "reports/cash-payables"],
                ["code" => "REP_PHLTH_PAY", "name" => "Philhealth Payables", "icon" => "fa-money", "url" => "reports/philhealth-payables"],
                ["code" => "REP_SSS_PAY", "name" => "SSS Payables", "icon" => "fa-money", "url" => "reports/sss-payables"],
                ["code" => "REP_TAX_PAY", "name" => "Tax Withheld Payables", "icon" => "fa-money", "url" => "reports/tax-payables"],
                //  special report (but is actually just the same as REP_PHLTH_PAY, REP_SSS_PAY, and REP_TAX_PAY on the back)
                ["code" => "REP_TMC_BILL", "name" => "Payable to TMC", "icon" => "fa-money", "url" => "reports/tmc-billing"],
                ["code" => "REP_COM_BILL", "name" => "Company Billing", "icon" => "fa-money", "url" => "reports/company-billing"],
            ]
        ],
        [
            "icon"    => "fa-files-o",
            "name"    => "Sys. Master Files",
            "modules" => [
                ["code" => "NS", "name" => "Number Series", "icon" => "fa-file-o", "url" => "master-files/number-series"],
                ["code" => "COM", "name" => "Company", "icon" => "fa-home", "url" => "master-files/companies"],
                ["code" => "LOC", "name" => "Location", "icon" => "fa-map-marker", "url" => "master-files/locations"],
                ["code" => "CPC", "name" => "Cost Centers", "icon" => "fa-bank", "url" => "master-files/cost-profit-centers"],
                ["code" => "BNK", "name" => "Bank Accounts", "icon" => "fa-bank", "url" => "master-files/bank-accounts"],
            ]
        ],
        [
            "icon"    => "fa-files-o",
            "name"    => "HR Master Files",
            "modules" => [
                ["code" => "EMP", "name" => "Employees", "icon" => "fa-users", "url" => "HRIS/employees"],
                ["code" => "PLCY", "name" => "Policies", "icon" => "fa-file-text-o", "url" => "HRIS/policies"],
                ["code" => "HOL", "name" => "Holidays", "icon" => "fa-calendar-check-o", "url" => "HRIS/holidays"],
                ["code" => "SHFT", "name" => "Shifts", "icon" => "fa-clock-o", "url" => "HRIS/shifts"],
                ["code" => "WORK_SCHED", "name" => "Work Schedules", "icon" => "fa-clock-o", "url" => "HRIS/work-schedules"],
            ]
        ],
        [
            "icon"    => "fa-files-o",
            "name"    => "Payroll Master Files",
            "modules" => [
                ["code" => "PAY_ITEMS", "name" => "Payroll Items", "icon" => "fa-file-text-o", "url" => "payroll/payroll-items"],
                ["code" => "TAX_CAT", "name" => "Tax Categories", "icon" => "fa-dollar", "url" => "master-files/tax-categories"],
//                ["code" => "TAX_TBL", "name" => "Tax Table", "icon" => "fa-table", "url" => "master-files/computation-tables/tax-table"],
//                ["code" => "SSS_TBL", "name" => "SSS Table", "icon" => "fa-table", "url" => "master-files/computation-tables/sss-table"],
//                ["code" => "PHLTH_TBL", "name" => "Philhealth Table", "icon" => "fa-table", "url" => "master-files/computation-tables/philhealth-table"],
            ]
        ],
        [
            "icon"    => "fa-lock",
            "name"    => "Security",
            "modules" => [
                ["code" => "UA", "name" => "User Accounts", "icon" => "fa-user", "url" => "master-files/user-accounts"],
                ["code" => "RL", "name" => "Role", "icon" => "fa-lock", "url" => "security/roles"],
                ["code" => "ACL", "name" => "ACL", "icon" => "fa-users", "url" => "security/acl"]
            ]
        ],
    ];

    public function getAccessibleModules() {

        //  if the current user has admin role
        if (in_array("ADMIN", array_column(Auth::user()->roles->toArray(), "code"))) {
            //  it will have all module access
            return $this->moduleOrder;
        }

        $accessibleModuleCodes = Auth::user()->getAccessibleModuleList();
        $accessibleModuleOrder = [];

        //  loop through all the module groups (or headers: Production, Inventory Mangement, Master Files, etc.)
        foreach ($this->moduleOrder AS $moduleGroup) {

            $accessibleModuleGroup = [
                "icon"    => $moduleGroup["icon"],
                "name"    => $moduleGroup["name"],
                "modules" => []
            ];

            //  each module groups contains modules, check if the user has access
            //  to them, if yes, add the module to the accessible module group
            foreach ($moduleGroup["modules"] AS $module) {
                if (in_array($module["code"], $accessibleModuleCodes)) {
                    array_push($accessibleModuleGroup["modules"], $module);
                }
            }

            //  if the current user has 1 or more modules accessible under this group
            if (count($accessibleModuleGroup["modules"]) > 0) {
                //  add the group to the accessible module order
                array_push($accessibleModuleOrder, $accessibleModuleGroup);
            }
        }

        return $accessibleModuleOrder;
    }

}
