<?php

use App\Models\HRIS\Position;
use App\Models\HRIS\PositionLevel;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $positionLevels = [
            ["code" => "RNF", "display_name" => "Rank & File", "level" => 1000],
            ["code" => "SUP", "display_name" => "Supervisory", "level" => 2000],
            ["code" => "MAN", "display_name" => "Managerial", "level" => 3000],
            ["code" => "DIR", "display_name" => "Directoral", "level" => 4000],
            ["code" => "EXEC", "display_name" => "Executive", "level" => 5000],
        ];

        PositionLevel::insert($positionLevels);

        $executives = [
            ["code" => 5001, "display_name" => "President", "position_level_code" => "EXEC"],
            ["code" => 5002, "display_name" => "Vice President", "position_level_code" => "EXEC"],
        ];

        Position::insert($executives);

        $directors = [
            ["code" => 4001, "display_name" => "Operation Manager", "position_level_code" => "DIR"],
            ["code" => 4002, "display_name" => "Asst. Operation Manager", "position_level_code" => "DIR"],
            ["code" => 4003, "display_name" => "ADMIN/HR Officer", "position_level_code" => "DIR"],
            ["code" => 4004, "display_name" => "Asst. Admin/HR Officer", "position_level_code" => "DIR"],
            ["code" => 4005, "display_name" => "Business Devt. Officer", "position_level_code" => "DIR"],
        ];

        Position::insert($directors);

        $managers = [
            ["code" => 3001, "display_name" => "Recruitment Manager", "position_level_code" => "MAN", "parent_code" => NULL],
            ["code" => 3002, "display_name" => "Payroll Manager", "position_level_code" => "MAN", "parent_code" => NULL],
            ["code" => 3003, "display_name" => "Chief Accountant", "position_level_code" => "MAN", "parent_code" => NULL],
        ];

        Position::insert($managers);

        $supervisors = [
            ["code" => 2001, "display_name" => "Recruitment Supervisor", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2002, "display_name" => "Payroll Assistant Manager", "position_level_code" => "SUP", "parent_code" => NULL],
            ["code" => 2003, "display_name" => "Timekeeper", "position_level_code" => "SUP", "parent_code" => NULL],
        ];

        Position::insert($supervisors);

        $rankAndFiles = [
            ["code" => 1001, "display_name" => "Staff", "position_level_code" => "RNF", "parent_code" => NULL],
            ["code" => 1002, "display_name" => "Accounting Staff", "position_level_code" => "RNF", "parent_code" => NULL],
        ];

        Position::insert($rankAndFiles);
    }

}
