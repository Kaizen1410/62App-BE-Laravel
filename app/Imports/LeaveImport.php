<?php

namespace App\Imports;

use App\Models\Leave;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeaveImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $leave = new Leave([
            "employee_id" => $row['employee_id'],
            "date_leave" => $row['date_leave'],
            "is_approved" => $row['is_approved'],
            "approved_by" => $row['approved_by'],
        ]);

        return $leave;
    }
}
