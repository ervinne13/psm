<?php

namespace App\Models\HRIS;

use App\Models\MasterFiles\Company;
use App\Models\MasterFiles\Location;
use App\Models\Payroll\TaxCategory;
use App\Models\SGModel;

class Employee extends SGModel {

    public $incrementing         = false;
    protected $table             = "hris.employee";
    protected $primaryKey        = "code";
    protected $objectDisplayName = "Employee";
    //
    /*     * ************************************************************************* */
    // <editor-fold defaultstate="collapsed" desc="Fillable">

    protected $fillable = [
        "code",
        "is_active",
        "policy_code",
        "location_code",
        "position_code",
        "tax_category_code",
        "email",
        "first_name",
        "middle_name",
        "last_name",
        "address",
        "birth_date",
        "gender_code",
        "civil_status_code",
        "contact_number_1",
        "contact_number_2",
        "date_hired",
        "basic_salary",
        "basic_salary_uom"
    ];

    // </editor-fold>

    /*     * ************************************************************************* */
    // <editor-fold defaultstate="collapsed" desc="Scopes">

    public function scopeAlphabeticalFirstName($query) {
        return $query->orderBy("first_name");
    }

    public function scopeAlphabeticalLastName($query) {
        return $query->orderBy("last_name");
    }

    // </editor-fold>

    /*     * ************************************************************************* */
    // <editor-fold defaultstate="collapsed" desc="Relationships">

    public function location() {
        return $this->belongsTo(Location::class, "location_code");
    }

    public function company() {
        return $this->belongsTo(Company::class, "company_code");
    }

    public function position() {
        return $this->belongsTo(Position::class, "position_code");
    }

    public function taxCategory() {
        return $this->belongsTo(TaxCategory::class, "tax_category_code");
    }

    public function policy() {
        return $this->belongsTo(Policy::class, "policy_code");
    }

    public function employeeWorkSchedules() {
        return $this->hasMany(EmployeeWorkSchedule::class, "employee_code");
    }

    public function payrollItemsAmount() {
        return $this->hasMany(EmployeePayrollItemAmount::class, "employee_code");
    }

    // </editor-fold>
}
