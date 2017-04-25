<?php

use App\Models\Payroll\TaxCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        try {

            DB::beginTransaction();

            $tables = [
                //  security
                "security.user_role",
                "security.access_control_list",
                "security.access_control",
                "security.role",
                "user_account",
                // module
                "module",
                "number_series",
                //  computation tables & tax
                "payroll.tax_category",
                "payroll.monthly_tax_table",
                "payroll.annual_tax_table",
                "payroll.sss_table",
                "payroll.philhealth_table",
                //  HRIS                
                "hris.employee_payroll_item_amount",
                "hris.holiday_location",
                "hris.holiday",
                "hris.policy_payroll_item",
                "hris.policy",
                //
                "hris.position_level",
                "hris.position",
                //
                "bank",
                //
                "hris.work_schedule_shift",
                "hris.employee_work_schedule",
                "hris.work_schedule",
                "hris.shift",
                //  payroll               
                "payroll.chrono_log",
                "payroll.payroll_payment_method",
                "payroll.employee_payroll_summary",
                "payroll.payroll_entry",
                "payroll.payroll_type",
                "payroll.payroll_item",
                "payroll.overtime_summary",
                "payroll.payroll",
                //
                "hris.employee",
                //
                "user_location",
                "location",
                "cost_profit_center",
                "company",
            ];

            DB::statement('TRUNCATE TABLE ' . implode(',', $tables) . ';');

            $this->call(CompaniesSeeder::class);
            $this->call(LocationsSeeder::class);

            $this->call(ModulesSeeder::class);
            $this->call(DefaultRolesAndUsersSeeder::class);

            $this->call(ShiftsSeeder::class);
            $this->call(WorkScheduleSeeder::class);

            //  Payroll Setup
            $this->call(TaxCategorySeeder::class);
            $this->call(PayrollTypeSeeder::class);
            $this->call(PayrollItemSeeder::class);
            $this->call(PoliciesSeeder::class);
            $this->call(ComputationTablesSeeder::class);

            $this->call(PositionsSeeder::class);

            $this->call(EmployeeSeeder::class);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

}
