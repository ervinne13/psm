<?php

use App\Models\MasterFiles\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $companies = [
            ["code" => "BLTMZR", "display_name" => "Boltimizer"],
            ["code" => "HYTORC", "display_name" => "HYTORC"],
            ["code" => "SAM_SEC_AGCY", "display_name" => "Sample Security Agency"]
        ];

        Company::insert($companies);
    }

}
