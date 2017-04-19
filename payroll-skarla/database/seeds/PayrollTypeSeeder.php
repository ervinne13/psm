<?php

use App\Models\Payroll\PayrollType;
use Illuminate\Database\Seeder;

class PayrollTypeSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $payrollTypes = [
            ["code" => "D", "display_name" => "Daily"],
            ["code" => "W", "display_name" => "Weekly"],
            ["code" => "SM", "display_name" => "Semi-Monthly"],
            ["code" => "M", "display_name" => "Monthly"],
        ];

        PayrollType::insert($payrollTypes);
    }

}
