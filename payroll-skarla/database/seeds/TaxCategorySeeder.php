<?php

use App\Models\Payroll\TaxCategory;
use Illuminate\Database\Seeder;

class TaxCategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $taxCategories = [
            ["code" => "Z", "display_name" => "No Dependents (Z)", "annual_exemption_amount" => 0],
            ["code" => "SME", "display_name" => "Head of the Family (SME)", "annual_exemption_amount" => 50000],
            ["code" => "ME1S1", "display_name" => "With 1 Dependent (ME1 / S1)", "annual_exemption_amount" => 75000],
            ["code" => "ME2S2", "display_name" => "With 2 Dependents (ME2 / S2)", "annual_exemption_amount" => 100000],
            ["code" => "ME3S3", "display_name" => "With 3 Dependents (ME3 / S3)", "annual_exemption_amount" => 125000],
            ["code" => "ME4S4", "display_name" => "With 4 Dependents (ME4 / S4)", "annual_exemption_amount" => 150000]
        ];

        TaxCategory::insert($taxCategories);
    }

}
