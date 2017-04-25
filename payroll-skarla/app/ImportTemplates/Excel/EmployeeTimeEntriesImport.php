<?php

namespace App\ImportTemplates\Excel;

use App\Models\Timekeeping\Chronolog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Files\ExcelFile;
use function base_path;

/**
 * Description of EmployeeTimeEntriesImport
 *
 * @author ervinne
 */
class EmployeeTimeEntriesImport extends ExcelFile {

    CONST PATH = "public/employee-time-entries";

    public function getFile() {
        $rules = array(
            'file' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        // process the form
        if ($validator->fails()) {
            throw new ValidationException($validator);
        } else {
            $file              = Input::file('file');
            $generatedFileName = date("Y-m-d_HHmmss") . ".{$file->getClientOriginalExtension()}";
            $generatedPath     = $file->move(base_path() . "/public/employee-time-entries", $generatedFileName);

            return $generatedPath;
        }
    }

    public function storeEntries() {
        $chronoLogsArray = $this->get()->toArray();

        try {
            DB::beginTransaction();

            foreach ($chronoLogsArray AS $chronoLogArray) {
                if ($chronoLogArray["employee_code"] && $chronoLogArray["entry_date"]) {
                    $keys      = [
                        "employee_code" => $chronoLogArray["employee_code"],
                        "entry_date"    => $chronoLogArray["entry_date"]
                    ];
                    $chronoLog = Chronolog::firstOrNew($keys);
                    $chronoLog->fill($chronoLogArray);
                    $chronoLog->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getFilters() {
        return [
            'chunk'
        ];
    }

}
