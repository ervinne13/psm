<?php

use App\Models\MasterFiles\Location;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $locations = [
            ["code" => "BLTMZR_HO", "company_code" => "BLTMZR", "display_name" => "Boltimizer Head Office"],
            ["code" => "BLTMZR_B_HSQC", "company_code" => "BLTMZR", "display_name" => "Boltimizer Holy Spirit Quezon City Branch"],
            ["code" => "BLTMZR_P_QC1", "company_code" => "BLTMZR", "display_name" => "Boltimizer Quezon City Production Plant"],
            ["code" => "BLTMZR_W_QC1", "company_code" => "BLTMZR", "display_name" => "Boltimizer Quezon City Warehouse 1"],
            ["code" => "BLTMZR_W_QC2", "company_code" => "BLTMZR", "display_name" => "Boltimizer Quezon City Warehouse 2"],
            ["code" => "HYTORC_P_LG1", "company_code" => "HYTORC", "display_name" => "HYTORC Laguna Production Plant"],
            ["code" => "HYTORC_W_LG1", "company_code" => "HYTORC", "display_name" => "HYTORC Laguna Warehouse"],
        ];

        Location::insert($locations);
    }

}
