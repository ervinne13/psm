<?php

use App\Models\Security\AccessControl;
use App\Models\Security\AccessControlList;
use App\Models\Security\Role;
use App\Models\Security\UserLocation;
use App\Models\Security\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultRolesAndUsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->insertRoles();
        $this->insertAC();
        $this->insertACL();
        $this->insertUsers();
        $this->insertUserRoles();
        $this->insertUserLocations();
    }

    private function insertRoles() {
        $roles = [
            ["code" => "ADMIN", "display_name" => "Administrator"],
            ["code" => "PMSTR", "display_name" => "Payroll Master"],
            ["code" => "TKPR", "display_name" => "Timekeeper"],
            ["code" => "AUDIT", "display_name" => "Auditor"],
            ["code" => "ACCT", "display_name" => "Accountant"],
        ];

        Role::insert($roles);
    }

    private function insertAC() {
        $accessControls = [
            ["code" => "VIEWER", "display_name" => "Viewer"],
            ["code" => "AUTHOR", "display_name" => "Author"],
            ["code" => "MANAGER", "display_name" => "Manager"]
        ];

        AccessControl::insert($accessControls);
    }

    private function insertACL() {
        //  Staff ACL
        $accessControlLists = [
            //  payroll master
            ["role_code" => "PMSTR", "module_code" => "PAY_ENTS", "access_control_code" => "MANAGER"],
            ["role_code" => "PMSTR", "module_code" => "PAY_PROC", "access_control_code" => "AUTHOR"],
            ["role_code" => "PMSTR", "module_code" => "EMP_TE", "access_control_code" => "VIEWER"],
            ["role_code" => "PMSTR", "module_code" => "SS_WSCHED", "access_control_code" => "AUTHOR"],
            ["role_code" => "PMSTR", "module_code" => "OT_REQ", "access_control_code" => "AUTHOR"],
            ["role_code" => "PMSTR", "module_code" => "LV_REQ", "access_control_code" => "AUTHOR"],
            //  timekeeper
            ["role_code" => "TKPR", "module_code" => "PAY_ENTS", "access_control_code" => "AUTHOR"],
            ["role_code" => "TKPR", "module_code" => "EMP_TE", "access_control_code" => "MANAGER"],
            ["role_code" => "TKPR", "module_code" => "SS_WSCHED", "access_control_code" => "AUTHOR"],
            ["role_code" => "TKPR", "module_code" => "OT_REQ", "access_control_code" => "AUTHOR"],
            ["role_code" => "TKPR", "module_code" => "LV_REQ", "access_control_code" => "AUTHOR"],
        ];

        AccessControlList::insert($accessControlLists);
    }

    private function insertUsers() {
        $users = [
            ["username" => "admin", "display_name" => "Administrator", "location_full_access" => true],
            ["username" => "dtumulak", "display_name" => "Doris Tumulak", "location_full_access" => false],
            ["username" => "yyao", "display_name" => "Yvonne Yao", "location_full_access" => false],
            ["username" => "atampus", "display_name" => "April Tampus", "location_full_access" => false],
            ["username" => "lbatarao", "display_name" => "Lizeth Batarao", "location_full_access" => false],
            ["username" => "evillalon", "display_name" => "Ehmar Villalon", "location_full_access" => false],
            ["username" => "gflores", "display_name" => "Gabrielle Flores", "location_full_access" => true],
            ["username" => "psampani", "display_name" => "Prosa Mae Sampani", "location_full_access" => true],
            ["username" => "ggarcia", "display_name" => "Gretchen Garcia", "location_full_access" => false],
        ];

        for ($i = 0; $i < count($users); $i ++) {
            $users[$i]["password"] = \Hash::make("password");
        }

        User::insert($users);
    }

    private function insertUserRoles() {

        $userRoles = [
            ["username" => "admin", "role_code" => "ADMIN"],
            ["username" => "dtumulak", "role_code" => "PMSTR"],
            ["username" => "yyao", "role_code" => "PMSTR"],
            ["username" => "atampus", "role_code" => "TKPR"],
            ["username" => "lbatarao", "role_code" => "PMSTR"],
            ["username" => "evillalon", "role_code" => "TKPR"],
            ["username" => "gflores", "role_code" => "AUDIT"],
            ["username" => "psampani", "role_code" => "ACCT"],
            //  1 user can also have multiple roles
            ["username" => "ggarcia", "role_code" => "PMSTR"],
            ["username" => "ggarcia", "role_code" => "TKPR"]
        ];

        UserRole::insert($userRoles);
    }

    private function insertUserLocations() {

        $locations = [
            ["username" => "dtumulak", "location_code" => "AERO_HO", "is_default" => true],
            ["username" => "yyao", "location_code" => "AERO_HO", "is_default" => true],
            ["username" => "atampus", "location_code" => "AERO_HO", "is_default" => true],
            ["username" => "lbatarao", "location_code" => "AERO_HO", "is_default" => true],
            ["username" => "lbatarao", "location_code" => "AERO_B1", "is_default" => true],
            ["username" => "lbatarao", "location_code" => "AERO_B2", "is_default" => true],
            ["username" => "ggarcia", "location_code" => "AERO_B1", "is_default" => true],
            ["username" => "ggarcia", "location_code" => "AERO_B2", "is_default" => false],
            ["username" => "ggarcia", "location_code" => "AERO_RB1", "is_default" => false],
            ["username" => "ggarcia", "location_code" => "AERO_RB2", "is_default" => false]
        ];

        UserLocation::insert($locations);
    }

}
