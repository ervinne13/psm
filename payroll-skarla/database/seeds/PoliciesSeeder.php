<?php

use App\Models\HRIS\Policy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliciesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $policies = [
            ["code" => "MR", "display_name" => "Monthly Regular", "grace_period_minutes" => 15]
        ];

        Policy::insert($policies);

        $policyPayrollItemCodes = [
            "SYS_D_WHT",
            "SYS_D_SSS",
            "SYS_D_PHLTH",
            "SYS_D_LU",
            "SYS_D_HDA",
            "SYS_D_ABS",
            "SYS_D_ROT",
            "SYS_E_RDOT",
            "SYS_E_RHOT",
            "SYS_E_RRHOT",
            "SYS_E_SHOT",
            "SYS_E_RSHOT",
            "SYS_E_NDIFF",
        ];

        $policyPayrollItems = [];

        foreach ($policyPayrollItemCodes AS $code) {
            array_push($policyPayrollItems, [
                "policy_code"       => "MR",
                "payroll_item_code" => $code,
            ]);
        }

        DB::table("hris.policy_payroll_item")->insert($policyPayrollItems);
    }

}
