<?php

use App\Models\HRIS\Shift;
use Illuminate\Database\Seeder;

class ShiftsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // morning shifts are bright yellow - red orange colors
        // mid shifts are range of blue colors
        // night shifts are range of greay colors

        $shifts = [
            [
                "code"                     => "MS1",
                "display_name"             => "Morning Shift 1",
                "scheduled_in"             => "6:00",
                "scheduled_out"            => "3:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "22:00",
                "shift_differential_end"   => "6:00",
                "calendar_color"           => "#08a5e1"//LIGHTING-YELLOW
            ],
            [
                "code"                     => "MS2",
                "display_name"             => "Morning Shift 2",
                "scheduled_in"             => "7:00",
                "scheduled_out"            => "4:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "22:00",
                "shift_differential_end"   => "6:00",
                "calendar_color"           => "#68fee0"//AMAZON
            ],
            [
                "code"                     => "MS3",
                "display_name"             => "Morning Shift 3",
                "scheduled_in"             => "8:00",
                "scheduled_out"            => "5:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "22:00",
                "shift_differential_end"   => "6:00",
                "calendar_color"           => "#e66c40 "//WARNING/ORANGE
            ],
            [
                "code"                     => "MS4",
                "display_name"             => "Morning Shift 4",
                "scheduled_in"             => "9:00",
                "scheduled_out"            => "6:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "22:00",
                "shift_differential_end"   => "6:00",
                "calendar_color"           => "#68fee0"//JASPER
            ],
            //  Mid Shifts
            [
                "code"                     => "MDS1",
                "display_name"             => "Mid Shift 1",
                "scheduled_in"             => "12:00",
                "scheduled_out"            => "9:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "00:00",
                "shift_differential_end"   => "00:00",
                "calendar_color"           => "#08a5e1"//TWITTER
            ],
            [
                "code"                     => "MDS2",
                "display_name"             => "Mid Shift 2",
                "scheduled_in"             => "13:00",
                "scheduled_out"            => "10:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "00:00",
                "shift_differential_end"   => "00:00",
                "calendar_color"           => "#2d99dc"//PRIMARY
            ],
            [
                "code"                     => "MDS3",
                "display_name"             => "Mid Shift 3",
                "scheduled_in"             => "14:00",
                "scheduled_out"            => "11:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "00:00",
                "shift_differential_end"   => "00:00",
                "calendar_color"           => "#732c86"//LINKEDIN
            ],
            [
                "code"                     => "MDS4",
                "display_name"             => "Mid Shift 4",
                "scheduled_in"             => "15:00",
                "scheduled_out"            => "00:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "00:00",
                "shift_differential_end"   => "00:00",
                "calendar_color"           => "#08a5e1"//FACEBOOK
            ],
            //  Night Shifts
            [
                "code"                     => "NS1",
                "display_name"             => "Night Shift 1",
                "scheduled_in"             => "16:00",
                "scheduled_out"            => "1:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "00:00",
                "shift_differential_end"   => "00:00",
                "calendar_color"           => "#444444 "//GRAY-LIGHT
            ],
            [
                "code"                     => "NS2",
                "display_name"             => "Night Shift 2",
                "scheduled_in"             => "17:00",
                "scheduled_out"            => "2:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "00:00",
                "shift_differential_end"   => "00:00",
                "calendar_color"           => "#383838"//GRAY
            ],
            [
                "code"                     => "NS3",
                "display_name"             => "Night Shift 3",
                "scheduled_in"             => "18:00",
                "scheduled_out"            => "3:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "00:00",
                "shift_differential_end"   => "00:00",
                "calendar_color"           => "#2d2d2d "//GRAY-DARK
            ],
            [
                "code"                     => "NS4",
                "display_name"             => "Night Shift 4",
                "scheduled_in"             => "19:00",
                "scheduled_out"            => "4:00",
                "forced_break_minutes"     => 60,
                "shift_differential_start" => "00:00",
                "shift_differential_end"   => "00:00",
                "calendar_color"           => "#262626  "//GRAY-DARKER
            ],
            //  Others
            [
                "code"                     => "DO",
                "display_name"             => "Day Off",
                "scheduled_in"             => "00:00",
                "scheduled_out"            => "00:00",
                "forced_break_minutes"     => 0,
                "shift_differential_start" => "00:00",
                "shift_differential_end"   => "00:00",
                "calendar_color"           => "#5c5c5c  "//GRAY-LIGHTER
            ],
        ];

        Shift::insert($shifts);
    }

}
