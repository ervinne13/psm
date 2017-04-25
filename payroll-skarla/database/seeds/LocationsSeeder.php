<?php

use App\Models\MasterFiles\CostProfitCenter;
use App\Models\MasterFiles\Location;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $CPCs = [
            ["code" => "AERO_MAIN_CPC", "display_name" => "AEROPACK INDUSTRIES, INC. Main", "company_code" => "AERO"],
            ["code" => "AERO_REM_CPC_1", "display_name" => "AEROPACK INDUSTRIES, INC. Remote Branch Cluster 1", "company_code" => "AERO"],
            ["code" => "CHI_CPC", "display_name" => "CHEMREZ INC.", "company_code" => "CHI"],
            ["code" => "CTI_CPC", "display_name" => "CHEMREZ TECHNOLOGIES, INC.", "company_code" => "CTI"],
            ["code" => "CCPI_CPC", "display_name" => "CONSUMER CARE PRODUCTS, INC.", "company_code" => "CCPI"],
            ["code" => "D&L_CPC", "display_name" => "D&L INDUSTRIES, INC.", "company_code" => "D&L"],
            ["code" => "DLPCI_CPC", "display_name" => "D & L POLYMER & COLOURS, INC.", "company_code" => "DLPCI"],
            ["code" => "FICM_CPC", "display_name" => "FIC MARKETING CO., INC.", "company_code" => "FICM"]
        ];

        CostProfitCenter::insert($CPCs);

        $locations = [
            ["code" => "AERO_HO", "company_code" => "AERO", "cost_profit_center_code" => "AERO_MAIN_CPC", "display_name" => "AERO Head Office"],
            ["code" => "AERO_B1", "company_code" => "AERO", "cost_profit_center_code" => "AERO_MAIN_CPC", "display_name" => "AERO Test Branch 1"],
            ["code" => "AERO_B2", "company_code" => "AERO", "cost_profit_center_code" => "AERO_MAIN_CPC", "display_name" => "AERO Test Branch 2"],
            ["code" => "AERO_RB1", "company_code" => "AERO", "cost_profit_center_code" => "AERO_REM_CPC_1", "display_name" => "AERO Remote Provice Branch 1"],
            ["code" => "AERO_RB2", "company_code" => "AERO", "cost_profit_center_code" => "AERO_REM_CPC_1", "display_name" => "AERO Remote Provice Branch 2"],
            ["code" => "CHI_B1", "company_code" => "AERO", "cost_profit_center_code" => "CHI_CPC", "display_name" => "CHI Test Branch 1"],
            ["code" => "CTI_B1", "company_code" => "AERO", "cost_profit_center_code" => "CTI_CPC", "display_name" => "CTI Test Branch 1"],
            ["code" => "CCPI_B1", "company_code" => "AERO", "cost_profit_center_code" => "CCPI_CPC", "display_name" => "CCPI Test Branch 1"],
            ["code" => "D&L_B1", "company_code" => "AERO", "cost_profit_center_code" => "D&L_CPC", "display_name" => "D&L Test Branch 1"],
            ["code" => "DLPCI_B1", "company_code" => "AERO", "cost_profit_center_code" => "DLPCI_CPC", "display_name" => "DLPCI Test Branch 1"],
            ["code" => "FICM_B1", "company_code" => "AERO", "cost_profit_center_code" => "FICM_CPC", "display_name" => "FICM Test Branch 1"],
        ];

        Location::insert($locations);
    }

}
