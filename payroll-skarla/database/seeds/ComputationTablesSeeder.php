<?php

use App\Models\Payroll\ComputationTable\AnnualTax;
use App\Models\Payroll\ComputationTable\MonthlyTax;
use App\Models\Payroll\ComputationTable\Philhealth;
use App\Models\Payroll\ComputationTable\SSS;
use Illuminate\Database\Seeder;

class ComputationTablesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->seedAnnualTax();
        $this->seedMonthlyTax();
        $this->seedSSS();
        $this->seedPhilhealth();
    }

    private function seedAnnualTax() {
        $annualTax = [
            ["over_amount" => 0, "under_amount" => 10000, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["over_amount" => 10000, "under_amount" => 29999, "tax_due" => 500, "tax_due_percent_of_excess" => 10],
            ["over_amount" => 30000, "under_amount" => 69999, "tax_due" => 2500, "tax_due_percent_of_excess" => 15],
            ["over_amount" => 70000, "under_amount" => 13999, "tax_due" => 8500, "tax_due_percent_of_excess" => 20],
            ["over_amount" => 140000, "under_amount" => 24999, "tax_due" => 22500, "tax_due_percent_of_excess" => 25],
            ["over_amount" => 250000, "under_amount" => 49999, "tax_due" => 50000, "tax_due_percent_of_excess" => 30],
            ["over_amount" => 500000, "under_amount" => 10000000, "tax_due" => 125000, "tax_due_percent_of_excess" => 32]
        ];

        AnnualTax::insert($annualTax);
    }

    private function seedMonthlyTax() {

        // <editor-fold defaultstate="collapsed" desc="Daily Wagers">

        $dailyWager = [
            //  Zero Dependent, Daily Wager
            ["tax_category_code" => "Z", "payroll_type_code" => "D", "over_amount" => 0, "under_amount" => 33, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "Z", "payroll_type_code" => "D", "over_amount" => 33, "under_amount" => 99, "tax_due" => 1.65, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "Z", "payroll_type_code" => "D", "over_amount" => 99, "under_amount" => 231, "tax_due" => 8.25, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "Z", "payroll_type_code" => "D", "over_amount" => 231, "under_amount" => 462, "tax_due" => 28.05, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "Z", "payroll_type_code" => "D", "over_amount" => 462, "under_amount" => 825, "tax_due" => 74.26, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "Z", "payroll_type_code" => "D", "over_amount" => 825, "under_amount" => 1650, "tax_due" => 165.02, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "Z", "payroll_type_code" => "D", "over_amount" => 1650, "under_amount" => 999999, "tax_due" => 412.54, "tax_due_percent_of_excess" => 32],
            //  Head of the Family, Daily Wager            
            ["tax_category_code" => "SME", "payroll_type_code" => "D", "over_amount" => 0, "under_amount" => 165, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "SME", "payroll_type_code" => "D", "over_amount" => 165, "under_amount" => 198, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "SME", "payroll_type_code" => "D", "over_amount" => 198, "under_amount" => 264, "tax_due" => 1.65, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "SME", "payroll_type_code" => "D", "over_amount" => 264, "under_amount" => 396, "tax_due" => 8.25, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "SME", "payroll_type_code" => "D", "over_amount" => 396, "under_amount" => 627, "tax_due" => 28.05, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "SME", "payroll_type_code" => "D", "over_amount" => 627, "under_amount" => 990, "tax_due" => 74.26, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "SME", "payroll_type_code" => "D", "over_amount" => 990, "under_amount" => 1815, "tax_due" => 165.02, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "SME", "payroll_type_code" => "D", "over_amount" => 1815, "under_amount" => 999999, "tax_due" => 412.54, "tax_due_percent_of_excess" => 32],
            //  1 Dependent
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "D", "over_amount" => 0, "under_amount" => 248, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "D", "over_amount" => 248, "under_amount" => 281, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "D", "over_amount" => 281, "under_amount" => 347, "tax_due" => 1.65, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "D", "over_amount" => 347, "under_amount" => 479, "tax_due" => 8.25, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "D", "over_amount" => 479, "under_amount" => 710, "tax_due" => 28.05, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "D", "over_amount" => 710, "under_amount" => 1073, "tax_due" => 74.26, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "D", "over_amount" => 1073, "under_amount" => 1898, "tax_due" => 165.02, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "D", "over_amount" => 1898, "under_amount" => 999999, "tax_due" => 412.54, "tax_due_percent_of_excess" => 32],
            //  2 Dependents
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "D", "over_amount" => 0, "under_amount" => 330, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "D", "over_amount" => 330, "under_amount" => 363, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "D", "over_amount" => 363, "under_amount" => 429, "tax_due" => 1.65, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "D", "over_amount" => 429, "under_amount" => 561, "tax_due" => 8.25, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "D", "over_amount" => 561, "under_amount" => 792, "tax_due" => 28.05, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "D", "over_amount" => 792, "under_amount" => 1155, "tax_due" => 74.26, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "D", "over_amount" => 1155, "under_amount" => 1980, "tax_due" => 165.02, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "D", "over_amount" => 1980, "under_amount" => 999999, "tax_due" => 412.54, "tax_due_percent_of_excess" => 32],
            //  3 Dependents
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "D", "over_amount" => 0, "under_amount" => 413, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "D", "over_amount" => 413, "under_amount" => 446, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "D", "over_amount" => 446, "under_amount" => 512, "tax_due" => 1.65, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "D", "over_amount" => 512, "under_amount" => 644, "tax_due" => 8.25, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "D", "over_amount" => 644, "under_amount" => 875, "tax_due" => 28.05, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "D", "over_amount" => 875, "under_amount" => 1238, "tax_due" => 74.26, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "D", "over_amount" => 1238, "under_amount" => 2063, "tax_due" => 165.02, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "D", "over_amount" => 2063, "under_amount" => 999999, "tax_due" => 412.54, "tax_due_percent_of_excess" => 32],
            //  4 Dependents
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "D", "over_amount" => 0, "under_amount" => 495, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "D", "over_amount" => 495, "under_amount" => 528, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "D", "over_amount" => 528, "under_amount" => 594, "tax_due" => 1.65, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "D", "over_amount" => 594, "under_amount" => 726, "tax_due" => 8.25, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "D", "over_amount" => 726, "under_amount" => 957, "tax_due" => 28.05, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "D", "over_amount" => 957, "under_amount" => 1320, "tax_due" => 74.26, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "D", "over_amount" => 1320, "under_amount" => 2145, "tax_due" => 165.02, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "D", "over_amount" => 2145, "under_amount" => 999999, "tax_due" => 412.54, "tax_due_percent_of_excess" => 32],
        ];

        MonthlyTax::insert($dailyWager);

        // </editor-fold>

        /**         * ****************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Weekly Wagers">

        $weeklyWager = [
            //  Zero Dependent
            ["tax_category_code" => "Z", "payroll_type_code" => "W", "over_amount" => 0, "under_amount" => 192, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "Z", "payroll_type_code" => "W", "over_amount" => 192, "under_amount" => 577, "tax_due" => 9.62, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "Z", "payroll_type_code" => "W", "over_amount" => 577, "under_amount" => 1346, "tax_due" => 48.08, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "Z", "payroll_type_code" => "W", "over_amount" => 1346, "under_amount" => 2692, "tax_due" => 163.46, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "Z", "payroll_type_code" => "W", "over_amount" => 2692, "under_amount" => 4808, "tax_due" => 432.69, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "Z", "payroll_type_code" => "W", "over_amount" => 4808, "under_amount" => 9615, "tax_due" => 961.54, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "Z", "payroll_type_code" => "W", "over_amount" => 9615, "under_amount" => 999999, "tax_due" => 2403.85, "tax_due_percent_of_excess" => 32],
            //  Head of the Family        
            ["tax_category_code" => "SME", "payroll_type_code" => "W", "over_amount" => 0, "under_amount" => 962, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "SME", "payroll_type_code" => "W", "over_amount" => 962, "under_amount" => 1154, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "SME", "payroll_type_code" => "W", "over_amount" => 1154, "under_amount" => 1538, "tax_due" => 9.62, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "SME", "payroll_type_code" => "W", "over_amount" => 1538, "under_amount" => 2308, "tax_due" => 48.08, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "SME", "payroll_type_code" => "W", "over_amount" => 2308, "under_amount" => 3654, "tax_due" => 163.46, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "SME", "payroll_type_code" => "W", "over_amount" => 3654, "under_amount" => 5769, "tax_due" => 432.69, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "SME", "payroll_type_code" => "W", "over_amount" => 5769, "under_amount" => 10577, "tax_due" => 961.54, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "SME", "payroll_type_code" => "W", "over_amount" => 10577, "under_amount" => 999999, "tax_due" => 2403.85, "tax_due_percent_of_excess" => 32],
            //  1 Dependent
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "W", "over_amount" => 0, "under_amount" => 1442, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "W", "over_amount" => 1442, "under_amount" => 1635, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "W", "over_amount" => 1635, "under_amount" => 2019, "tax_due" => 9.62, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "W", "over_amount" => 2019, "under_amount" => 2788, "tax_due" => 48.08, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "W", "over_amount" => 2788, "under_amount" => 4135, "tax_due" => 163.46, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "W", "over_amount" => 4135, "under_amount" => 6250, "tax_due" => 432.69, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "W", "over_amount" => 6250, "under_amount" => 11058, "tax_due" => 961.54, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "W", "over_amount" => 11058, "under_amount" => 999999, "tax_due" => 2403.85, "tax_due_percent_of_excess" => 32],
            //  2 Dependents
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "W", "over_amount" => 0, "under_amount" => 1923, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "W", "over_amount" => 1923, "under_amount" => 2115, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "W", "over_amount" => 2115, "under_amount" => 2500, "tax_due" => 9.62, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "W", "over_amount" => 2500, "under_amount" => 3269, "tax_due" => 48.08, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "W", "over_amount" => 3269, "under_amount" => 4615, "tax_due" => 163.46, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "W", "over_amount" => 4615, "under_amount" => 6731, "tax_due" => 432.69, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "W", "over_amount" => 6731, "under_amount" => 11538, "tax_due" => 961.54, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "W", "over_amount" => 11538, "under_amount" => 999999, "tax_due" => 2403.85, "tax_due_percent_of_excess" => 32],
            //  3 Dependents
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "W", "over_amount" => 0, "under_amount" => 2404, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "W", "over_amount" => 2404, "under_amount" => 2596, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "W", "over_amount" => 2596, "under_amount" => 2981, "tax_due" => 9.62, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "W", "over_amount" => 2981, "under_amount" => 3750, "tax_due" => 48.08, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "W", "over_amount" => 3750, "under_amount" => 5096, "tax_due" => 163.46, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "W", "over_amount" => 5096, "under_amount" => 7212, "tax_due" => 432.69, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "W", "over_amount" => 7212, "under_amount" => 12019, "tax_due" => 961.54, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "W", "over_amount" => 12019, "under_amount" => 999999, "tax_due" => 2403.85, "tax_due_percent_of_excess" => 32],
            //  4 Dependents
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "W", "over_amount" => 0, "under_amount" => 2885, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "W", "over_amount" => 2885, "under_amount" => 3077, "tax_due" => 0, "tax_due_percent_of_excess" => 5],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "W", "over_amount" => 3077, "under_amount" => 3462, "tax_due" => 9.62, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "W", "over_amount" => 3462, "under_amount" => 4231, "tax_due" => 48.08, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "W", "over_amount" => 4231, "under_amount" => 5577, "tax_due" => 163.46, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "W", "over_amount" => 5577, "under_amount" => 7692, "tax_due" => 432.69, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "W", "over_amount" => 7692, "under_amount" => 12500, "tax_due" => 961.54, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "W", "over_amount" => 12500, "under_amount" => 999999, "tax_due" => 2403.85, "tax_due_percent_of_excess" => 32],
        ];

        MonthlyTax::insert($weeklyWager);

        // </editor-fold>

        /**         * ****************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Semi Monthly Wagers">

        $semiMonthlyWager = [
            //  Zero Dependent
            ["tax_category_code" => "Z", "payroll_type_code" => "SM", "over_amount" => 0, "under_amount" => 417, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "Z", "payroll_type_code" => "SM", "over_amount" => 417, "under_amount" => 1250, "tax_due" => 20.83, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "Z", "payroll_type_code" => "SM", "over_amount" => 1250, "under_amount" => 2917, "tax_due" => 104.17, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "Z", "payroll_type_code" => "SM", "over_amount" => 2917, "under_amount" => 5833, "tax_due" => 354.17, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "Z", "payroll_type_code" => "SM", "over_amount" => 5833, "under_amount" => 10417, "tax_due" => 937.50, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "Z", "payroll_type_code" => "SM", "over_amount" => 10417, "under_amount" => 20833, "tax_due" => 2083.33, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "Z", "payroll_type_code" => "SM", "over_amount" => 20833, "under_amount" => 999999, "tax_due" => 5208.33, "tax_due_percent_of_excess" => 32],
            //  Head of the family
            ["tax_category_code" => "SME", "payroll_type_code" => "SM", "over_amount" => 0, "under_amount" => 2083, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "SME", "payroll_type_code" => "SM", "over_amount" => 2083, "under_amount" => 2500, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "SME", "payroll_type_code" => "SM", "over_amount" => 2500, "under_amount" => 3333, "tax_due" => 20.83, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "SME", "payroll_type_code" => "SM", "over_amount" => 3333, "under_amount" => 5000, "tax_due" => 104.17, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "SME", "payroll_type_code" => "SM", "over_amount" => 5000, "under_amount" => 7917, "tax_due" => 354.17, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "SME", "payroll_type_code" => "SM", "over_amount" => 7917, "under_amount" => 12500, "tax_due" => 937.50, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "SME", "payroll_type_code" => "SM", "over_amount" => 12500, "under_amount" => 22917, "tax_due" => 2083.33, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "SME", "payroll_type_code" => "SM", "over_amount" => 22917, "under_amount" => 999999, "tax_due" => 5208.33, "tax_due_percent_of_excess" => 32],
            //  1 Dependent
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "SM", "over_amount" => 0, "under_amount" => 3125, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "SM", "over_amount" => 3125, "under_amount" => 3542, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "SM", "over_amount" => 3542, "under_amount" => 4375, "tax_due" => 20.83, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "SM", "over_amount" => 4375, "under_amount" => 6042, "tax_due" => 104.17, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "SM", "over_amount" => 6042, "under_amount" => 8958, "tax_due" => 354.17, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "SM", "over_amount" => 8958, "under_amount" => 13542, "tax_due" => 937.50, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "SM", "over_amount" => 13542, "under_amount" => 23958, "tax_due" => 2083.33, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "SM", "over_amount" => 23958, "under_amount" => 999999, "tax_due" => 5208.33, "tax_due_percent_of_excess" => 32],
            //  2 Dependents
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "SM", "over_amount" => 0, "under_amount" => 4167, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "SM", "over_amount" => 4167, "under_amount" => 4583, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "SM", "over_amount" => 4583, "under_amount" => 5417, "tax_due" => 20.83, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "SM", "over_amount" => 5417, "under_amount" => 7083, "tax_due" => 104.17, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "SM", "over_amount" => 7083, "under_amount" => 10000, "tax_due" => 354.17, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "SM", "over_amount" => 10000, "under_amount" => 14583, "tax_due" => 937.50, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "SM", "over_amount" => 14583, "under_amount" => 25000, "tax_due" => 2083.33, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "SM", "over_amount" => 25000, "under_amount" => 999999, "tax_due" => 5208.33, "tax_due_percent_of_excess" => 32],
            //  3 Dependents
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "SM", "over_amount" => 0, "under_amount" => 5208, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "SM", "over_amount" => 5208, "under_amount" => 5625, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "SM", "over_amount" => 5625, "under_amount" => 6458, "tax_due" => 20.83, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "SM", "over_amount" => 6458, "under_amount" => 8125, "tax_due" => 104.17, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "SM", "over_amount" => 8125, "under_amount" => 11042, "tax_due" => 354.17, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "SM", "over_amount" => 11042, "under_amount" => 15625, "tax_due" => 937.50, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "SM", "over_amount" => 15625, "under_amount" => 26042, "tax_due" => 2083.33, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "SM", "over_amount" => 26042, "under_amount" => 999999, "tax_due" => 5208.33, "tax_due_percent_of_excess" => 32],
            //  3 Dependents
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "SM", "over_amount" => 0, "under_amount" => 6250, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "SM", "over_amount" => 6250, "under_amount" => 6667, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "SM", "over_amount" => 6667, "under_amount" => 7500, "tax_due" => 20.83, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "SM", "over_amount" => 7500, "under_amount" => 9167, "tax_due" => 104.17, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "SM", "over_amount" => 9167, "under_amount" => 12083, "tax_due" => 354.17, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "SM", "over_amount" => 12083, "under_amount" => 16667, "tax_due" => 937.50, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "SM", "over_amount" => 16667, "under_amount" => 27083, "tax_due" => 2083.33, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "SM", "over_amount" => 27083, "under_amount" => 999999, "tax_due" => 5208.33, "tax_due_percent_of_excess" => 32],
        ];

        MonthlyTax::insert($semiMonthlyWager);

        // </editor-fold>

        /**         * ****************************************************** */
        // <editor-fold defaultstate="collapsed" desc="Monthly Wager">

        $monthlyWage = [
            //  Zero Dependent
            ["tax_category_code" => "Z", "payroll_type_code" => "M", "over_amount" => 0, "under_amount" => 417, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "Z", "payroll_type_code" => "M", "over_amount" => 833, "under_amount" => 1250, "tax_due" => 41.67, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "Z", "payroll_type_code" => "M", "over_amount" => 1250, "under_amount" => 2917, "tax_due" => 208.33, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "Z", "payroll_type_code" => "M", "over_amount" => 2917, "under_amount" => 5833, "tax_due" => 708.33, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "Z", "payroll_type_code" => "M", "over_amount" => 5833, "under_amount" => 10417, "tax_due" => 1875, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "Z", "payroll_type_code" => "M", "over_amount" => 10417, "under_amount" => 20833, "tax_due" => 4166.67, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "Z", "payroll_type_code" => "M", "over_amount" => 20833, "under_amount" => 999999, "tax_due" => 10416.67, "tax_due_percent_of_excess" => 32],
            //  Head of the family
            ["tax_category_code" => "SME", "payroll_type_code" => "M", "over_amount" => 0, "under_amount" => 4167, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "SME", "payroll_type_code" => "M", "over_amount" => 4167, "under_amount" => 5000, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "SME", "payroll_type_code" => "M", "over_amount" => 5000, "under_amount" => 6667, "tax_due" => 41.67, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "SME", "payroll_type_code" => "M", "over_amount" => 6667, "under_amount" => 10000, "tax_due" => 208.33, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "SME", "payroll_type_code" => "M", "over_amount" => 10000, "under_amount" => 15833, "tax_due" => 708.33, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "SME", "payroll_type_code" => "M", "over_amount" => 15833, "under_amount" => 25000, "tax_due" => 1875, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "SME", "payroll_type_code" => "M", "over_amount" => 25000, "under_amount" => 45833, "tax_due" => 4166.67, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "SME", "payroll_type_code" => "M", "over_amount" => 45833, "under_amount" => 999999, "tax_due" => 10416.67, "tax_due_percent_of_excess" => 32],
            //  1 Dependent
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "M", "over_amount" => 0, "under_amount" => 6250, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "M", "over_amount" => 6250, "under_amount" => 7083, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "M", "over_amount" => 7083, "under_amount" => 8750, "tax_due" => 41.67, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "M", "over_amount" => 8750, "under_amount" => 12083, "tax_due" => 208.33, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "M", "over_amount" => 12083, "under_amount" => 17917, "tax_due" => 708.33, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "M", "over_amount" => 17917, "under_amount" => 27083, "tax_due" => 1875, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "M", "over_amount" => 27083, "under_amount" => 47917, "tax_due" => 4166.67, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME1S1", "payroll_type_code" => "M", "over_amount" => 47917, "under_amount" => 999999, "tax_due" => 10416.67, "tax_due_percent_of_excess" => 32],
            //  2 Dependents
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "M", "over_amount" => 0, "under_amount" => 8333, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "M", "over_amount" => 8333, "under_amount" => 9167, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "M", "over_amount" => 9167, "under_amount" => 10833, "tax_due" => 41.67, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "M", "over_amount" => 10833, "under_amount" => 14167, "tax_due" => 208.33, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "M", "over_amount" => 14167, "under_amount" => 20000, "tax_due" => 708.33, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "M", "over_amount" => 20000, "under_amount" => 29167, "tax_due" => 1875, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "M", "over_amount" => 29167, "under_amount" => 50000, "tax_due" => 4166.67, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME2S2", "payroll_type_code" => "M", "over_amount" => 50000, "under_amount" => 999999, "tax_due" => 10416.67, "tax_due_percent_of_excess" => 32],
            //  3 Dependents
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "M", "over_amount" => 0, "under_amount" => 10417, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "M", "over_amount" => 10417, "under_amount" => 11250, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "M", "over_amount" => 11250, "under_amount" => 12917, "tax_due" => 41.67, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "M", "over_amount" => 12917, "under_amount" => 16250, "tax_due" => 208.33, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "M", "over_amount" => 16250, "under_amount" => 22083, "tax_due" => 708.33, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "M", "over_amount" => 22083, "under_amount" => 31250, "tax_due" => 1875, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "M", "over_amount" => 31250, "under_amount" => 52083, "tax_due" => 4166.67, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME3S3", "payroll_type_code" => "M", "over_amount" => 52083, "under_amount" => 999999, "tax_due" => 10416.67, "tax_due_percent_of_excess" => 32],
            //  3 Dependents
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "M", "over_amount" => 0, "under_amount" => 12500, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "M", "over_amount" => 12500, "under_amount" => 13333, "tax_due" => 0, "tax_due_percent_of_excess" => 0],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "M", "over_amount" => 13333, "under_amount" => 15000, "tax_due" => 41.67, "tax_due_percent_of_excess" => 10],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "M", "over_amount" => 15000, "under_amount" => 18333, "tax_due" => 208.33, "tax_due_percent_of_excess" => 15],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "M", "over_amount" => 18333, "under_amount" => 25167, "tax_due" => 708.33, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "M", "over_amount" => 25167, "under_amount" => 33333, "tax_due" => 1875, "tax_due_percent_of_excess" => 25],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "M", "over_amount" => 33333, "under_amount" => 54167, "tax_due" => 4166.67, "tax_due_percent_of_excess" => 30],
            ["tax_category_code" => "ME4S4", "payroll_type_code" => "M", "over_amount" => 54167, "under_amount" => 999999, "tax_due" => 10416.67, "tax_due_percent_of_excess" => 32],
        ];

        MonthlyTax::insert($monthlyWage);

        // </editor-fold>
    }

    private function seedSSS() {
        $sss = [];

        $totalContrib        = 285;
        $employerShares      = [184.2, 221, 257.8, 294.7, 331.5, 368.3, 405.2, 442, 478.8, 515.7, 552.5, 589.3, 626.2, 663, 699.8, 736.7, 773.5, 810.3, 847.2, 884, 920.8, 957.7, 994.5, 1031.3, 1068.2, 1105, 1141.8, 1178.7];
        $monthlySalaryCredit = 2500;

        $counter = 0;
        for ($salaryRangeFrom = 2250; $salaryRangeFrom <= 15750; $salaryRangeFrom += 500) {

            $ec = $salaryRangeFrom >= 14750 ? 30 : 10;

            array_push($sss, [
                "salary_range_from"      => $salaryRangeFrom,
                "salary_range_to"        => $salaryRangeFrom + 499.99,
                "total_contribution"     => $totalContrib + ($counter * 55),
                "monthly_salary_credit"  => $monthlySalaryCredit + (500 * $counter),
                "employees_compensation" => $ec,
                "employer_share"         => $employerShares[$counter],
                "employee_share"         => $totalContrib + ($counter * 55) - $ec - $employerShares[$counter],
            ]);

            $counter ++;
        }

        SSS::insert($sss);
    }

    private function seedPhilhealth() {

        $philhealthTable = [
            ["salary_range_from" => 1, "salary_range_to" => 7999.99, "total_contribution" => 200, "employer_share" => 100, "employee_share" => 100]
        ];

        $contribution = 325;
        $counter      = 0;

        for ($salaryRangeFrom = 13000; $salaryRangeFrom <= 35000; $salaryRangeFrom += 1000) {
            $totalContribution = $contribution + ($counter * 25);

            array_push($philhealthTable, [
                "salary_range_from"  => $salaryRangeFrom,
                "salary_range_to"    => $salaryRangeFrom + 999.99,
                "total_contribution" => $totalContribution,
                "employer_share"     => $totalContribution / 2,
                "employee_share"     => $totalContribution / 2,
            ]);

            $counter ++;
        }

        Philhealth::insert($philhealthTable);
    }

}
