<?php

use App\Models\HRIS\WorkSchedule;
use App\Models\HRIS\WorkScheduleShift;
use Illuminate\Database\Seeder;

class WorkScheduleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $workSchedules = [
            //  Morning Shift Variants
            ["code" => "MFMS1", "display_name" => "Monday - Friday, Morning Shift 1"],
            ["code" => "MFMS2", "display_name" => "Monday - Friday, Morning Shift 2"],
            ["code" => "MFMS3", "display_name" => "Monday - Friday, Morning Shift 3"],
            ["code" => "MFMS4", "display_name" => "Monday - Friday, Morning Shift 4"],
            //  Mid Shift Variants
            ["code" => "MFMDS1", "display_name" => "Monday - Friday, Mid Shift 1"],
            ["code" => "MFMDS2", "display_name" => "Monday - Friday, Mid Shift 2"],
            ["code" => "MFMDS3", "display_name" => "Monday - Friday, Mid Shift 3"],
            ["code" => "MFMDS4", "display_name" => "Monday - Friday, Mid Shift 4"],
            //  Night Shift Variants
            ["code" => "MFNS1", "display_name" => "Monday - Friday, Night Shift 1"],
            ["code" => "MFNS2", "display_name" => "Monday - Friday, Night Shift 2"],
            ["code" => "MFNS3", "display_name" => "Monday - Friday, Night Shift 3"],
            ["code" => "MFNS4", "display_name" => "Monday - Friday, Night Shift 4"],
        ];

        WorkSchedule::insert($workSchedules);

        $workScheduleShifts = [
            //  MFMS1
            ["work_schedule_code" => "MFMS1", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFMS1", "shift_code" => "MS1", "week_day" => 2],
            ["work_schedule_code" => "MFMS1", "shift_code" => "MS1", "week_day" => 3],
            ["work_schedule_code" => "MFMS1", "shift_code" => "MS1", "week_day" => 4],
            ["work_schedule_code" => "MFMS1", "shift_code" => "MS1", "week_day" => 5],
            ["work_schedule_code" => "MFMS1", "shift_code" => "MS1", "week_day" => 6],
            ["work_schedule_code" => "MFMS1", "shift_code" => "DO", "week_day" => 7],
            //  MFMS2
            ["work_schedule_code" => "MFMS2", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFMS2", "shift_code" => "MS2", "week_day" => 2],
            ["work_schedule_code" => "MFMS2", "shift_code" => "MS2", "week_day" => 3],
            ["work_schedule_code" => "MFMS2", "shift_code" => "MS2", "week_day" => 4],
            ["work_schedule_code" => "MFMS2", "shift_code" => "MS2", "week_day" => 5],
            ["work_schedule_code" => "MFMS2", "shift_code" => "MS2", "week_day" => 6],
            ["work_schedule_code" => "MFMS2", "shift_code" => "DO", "week_day" => 7],
            //  MFMS3
            ["work_schedule_code" => "MFMS3", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFMS3", "shift_code" => "MS3", "week_day" => 2],
            ["work_schedule_code" => "MFMS3", "shift_code" => "MS3", "week_day" => 3],
            ["work_schedule_code" => "MFMS3", "shift_code" => "MS3", "week_day" => 4],
            ["work_schedule_code" => "MFMS3", "shift_code" => "MS3", "week_day" => 5],
            ["work_schedule_code" => "MFMS3", "shift_code" => "MS3", "week_day" => 6],
            ["work_schedule_code" => "MFMS3", "shift_code" => "DO", "week_day" => 7],
            //  MFMS4
            ["work_schedule_code" => "MFMS4", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFMS4", "shift_code" => "MS4", "week_day" => 2],
            ["work_schedule_code" => "MFMS4", "shift_code" => "MS4", "week_day" => 3],
            ["work_schedule_code" => "MFMS4", "shift_code" => "MS4", "week_day" => 4],
            ["work_schedule_code" => "MFMS4", "shift_code" => "MS4", "week_day" => 5],
            ["work_schedule_code" => "MFMS4", "shift_code" => "MS4", "week_day" => 6],
            ["work_schedule_code" => "MFMS4", "shift_code" => "DO", "week_day" => 7],
            //  MFMDS1
            ["work_schedule_code" => "MFMDS1", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFMDS1", "shift_code" => "MDS1", "week_day" => 2],
            ["work_schedule_code" => "MFMDS1", "shift_code" => "MDS1", "week_day" => 3],
            ["work_schedule_code" => "MFMDS1", "shift_code" => "MDS1", "week_day" => 4],
            ["work_schedule_code" => "MFMDS1", "shift_code" => "MDS1", "week_day" => 5],
            ["work_schedule_code" => "MFMDS1", "shift_code" => "MDS1", "week_day" => 6],
            ["work_schedule_code" => "MFMDS1", "shift_code" => "DO", "week_day" => 7],
            //  MFMDS2
            ["work_schedule_code" => "MFMDS2", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFMDS2", "shift_code" => "MDS2", "week_day" => 2],
            ["work_schedule_code" => "MFMDS2", "shift_code" => "MDS2", "week_day" => 3],
            ["work_schedule_code" => "MFMDS2", "shift_code" => "MDS2", "week_day" => 4],
            ["work_schedule_code" => "MFMDS2", "shift_code" => "MDS2", "week_day" => 5],
            ["work_schedule_code" => "MFMDS2", "shift_code" => "MDS2", "week_day" => 6],
            ["work_schedule_code" => "MFMDS2", "shift_code" => "DO", "week_day" => 7],
            //  MFMDS3
            ["work_schedule_code" => "MFMDS3", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFMDS3", "shift_code" => "MDS3", "week_day" => 2],
            ["work_schedule_code" => "MFMDS3", "shift_code" => "MDS3", "week_day" => 3],
            ["work_schedule_code" => "MFMDS3", "shift_code" => "MDS3", "week_day" => 4],
            ["work_schedule_code" => "MFMDS3", "shift_code" => "MDS3", "week_day" => 5],
            ["work_schedule_code" => "MFMDS3", "shift_code" => "MDS3", "week_day" => 6],
            ["work_schedule_code" => "MFMDS3", "shift_code" => "DO", "week_day" => 7],
            //  MFMDS4
            ["work_schedule_code" => "MFMDS4", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFMDS4", "shift_code" => "MDS4", "week_day" => 2],
            ["work_schedule_code" => "MFMDS4", "shift_code" => "MDS4", "week_day" => 3],
            ["work_schedule_code" => "MFMDS4", "shift_code" => "MDS4", "week_day" => 4],
            ["work_schedule_code" => "MFMDS4", "shift_code" => "MDS4", "week_day" => 5],
            ["work_schedule_code" => "MFMDS4", "shift_code" => "MDS4", "week_day" => 6],
            ["work_schedule_code" => "MFMDS4", "shift_code" => "DO", "week_day" => 7],
            //  MFNS1
            ["work_schedule_code" => "MFNS1", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFNS1", "shift_code" => "NS1", "week_day" => 2],
            ["work_schedule_code" => "MFNS1", "shift_code" => "NS1", "week_day" => 3],
            ["work_schedule_code" => "MFNS1", "shift_code" => "NS1", "week_day" => 4],
            ["work_schedule_code" => "MFNS1", "shift_code" => "NS1", "week_day" => 5],
            ["work_schedule_code" => "MFNS1", "shift_code" => "NS1", "week_day" => 6],
            ["work_schedule_code" => "MFNS1", "shift_code" => "DO", "week_day" => 7],
            //  MFNS2
            ["work_schedule_code" => "MFNS2", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFNS2", "shift_code" => "NS2", "week_day" => 2],
            ["work_schedule_code" => "MFNS2", "shift_code" => "NS2", "week_day" => 3],
            ["work_schedule_code" => "MFNS2", "shift_code" => "NS2", "week_day" => 4],
            ["work_schedule_code" => "MFNS2", "shift_code" => "NS2", "week_day" => 5],
            ["work_schedule_code" => "MFNS2", "shift_code" => "NS2", "week_day" => 6],
            ["work_schedule_code" => "MFNS2", "shift_code" => "DO", "week_day" => 7],
            //  MFNS3
            ["work_schedule_code" => "MFNS3", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFNS3", "shift_code" => "NS3", "week_day" => 2],
            ["work_schedule_code" => "MFNS3", "shift_code" => "NS3", "week_day" => 3],
            ["work_schedule_code" => "MFNS3", "shift_code" => "NS3", "week_day" => 4],
            ["work_schedule_code" => "MFNS3", "shift_code" => "NS3", "week_day" => 5],
            ["work_schedule_code" => "MFNS3", "shift_code" => "NS3", "week_day" => 6],
            ["work_schedule_code" => "MFNS3", "shift_code" => "DO", "week_day" => 7],
            //  MFNS4
            ["work_schedule_code" => "MFNS4", "shift_code" => "DO", "week_day" => 1],
            ["work_schedule_code" => "MFNS4", "shift_code" => "NS4", "week_day" => 2],
            ["work_schedule_code" => "MFNS4", "shift_code" => "NS4", "week_day" => 3],
            ["work_schedule_code" => "MFNS4", "shift_code" => "NS4", "week_day" => 4],
            ["work_schedule_code" => "MFNS4", "shift_code" => "NS4", "week_day" => 5],
            ["work_schedule_code" => "MFNS4", "shift_code" => "NS4", "week_day" => 6],
            ["work_schedule_code" => "MFNS4", "shift_code" => "DO", "week_day" => 7],
        ];

        WorkScheduleShift::insert($workScheduleShifts);
    }

}
