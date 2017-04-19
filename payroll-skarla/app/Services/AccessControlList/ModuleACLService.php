<?php

namespace App\Services\AccessControlList;

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
                ["code" => "EMP_TE", "name" => "Employee Time Entries", "icon" => "fa-clock-o", "url" => "timekeeping/entries"],
                ["code" => "EMP_TEC", "name" => "Time Entry Correction", "icon" => "fa-calendar-check-o", "url" => "timekeeping/correction"],
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
                ["code" => "PAY_SLP", "name" => "Payslip", "icon" => "fa-file-o", "url" => "reports/payslips"],
                ["code" => "BNK_REMIT", "name" => "Bank Remittance", "icon" => "fa-bank", "url" => "reports/bank-remittance"],
                ["code" => "CASH_PAY", "name" => "Cash Payables", "icon" => "fa-money", "url" => "reports/cash-payables"],
                ["code" => "PHLTH_PAY", "name" => "Philhealth Payables", "icon" => "fa-money", "url" => "reports/philhealth-payables"],
                ["code" => "SSS_PAY", "name" => "SSS Payables", "icon" => "fa-money", "url" => "reports/sss-payables"],
                ["code" => "TAX_PAY", "name" => "Tax Withheld Payables", "icon" => "fa-money", "url" => "reports/tax-payables"],
            ]
        ],
        [
            "icon"    => "fa-files-o",
            "name"    => "Sys. Master Files",
            "modules" => [
                ["code" => "NS", "name" => "Number Series", "icon" => "fa-file-o", "url" => "master-files/number-series"],
                ["code" => "COM", "name" => "Company", "icon" => "fa-home", "url" => "master-files/companies"],
                ["code" => "LOC", "name" => "Location", "icon" => "fa-map-marker", "url" => "master-files/locations"],
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
                ["code" => "PAY_ITEMS", "name" => "Payroll Items", "icon" => "fa-file-text-o", "url" => "HRIS/policies"],
                ["code" => "TAX_CAT", "name" => "Tax Categories", "icon" => "fa-dollar", "url" => "master-files/tax-categories"],
                ["code" => "TAX_TBL", "name" => "Tax Table", "icon" => "fa-table", "url" => "computation-tables/tax-table"],
                ["code" => "SSS_TBL", "name" => "SSS Table", "icon" => "fa-table", "url" => "computation-tables/sss-table"],
                ["code" => "PHLTH_TBL", "name" => "Philhealth Table", "icon" => "fa-table", "url" => "computation-tables/philhealth-table"],
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
