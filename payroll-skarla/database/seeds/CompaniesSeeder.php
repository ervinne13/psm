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
            ["code" => "AERO", "display_name" => "AEROPACK INDUSTRIES, INC.", "address" => "#65 Industria St. Bagumbayan Q.C"],
            ["code" => "CHI", "display_name" => "CHEMREZ INC.", "address" => "#65 Industria St. Bagumbayan Q.C"],
            ["code" => "CTI", "display_name" => "CHEMREZ TECHNOLOGIES, INC.", "address" => "#65 Industria St. Bagumbayan Q.C"],
            ["code" => "CCPI", "display_name" => "CONSUMER CARE PRODUCTS, INC.", "address" => "#65 Industria St. Bagumbayan Q.C"],
            ["code" => "D&L", "display_name" => "D&L INDUSTRIES, INC.", "address" => "#65 Industria St. Bagumbayan Q.C"],
            ["code" => "DLPCI", "display_name" => "D & L POLYMER & COLOURS, INC.", "address" => "#65 Industria St. Bagumbayan Q.C"],
            ["code" => "FICM", "display_name" => "FIC MARKETING CO., INC.", "address" => "#65 Industria St. Bagumbayan Q.C"]
        ];

        Company::insert($companies);
    }

}
