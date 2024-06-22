<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Courses;

class UsersAttendanceExport implements FromCollection, WithHeadings, ShouldAutoSize {

    public function headings(): array {

        $headers = [
            'COD',
            'CAPACITACIÓN',
            'LUGAR',
            'FECHA',
            'MODULADOR',
            'ASISTENTE',
            'DOCUMENTO',
            'ÁREA',
            'E-MAIL'
        ];

        return $headers;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {
        $query = DB::table('courses AS c')
                    ->select('ua.id', 'c.name', 'c.location', 'c.start_date', DB::raw('CONCAT(u.name, " ", u.lastname) as trainer'), DB::raw('CONCAT(student.name, student.lastname) as user_student'), 'student.document_number', 'la.name as user_workspace', 'student.email')
                    ->join('course_trainers AS ct', 'c.id', '=', 'ct.course_id')
                    ->join('user_attendance AS ua', 'ua.course_id', '=', 'c.id')
                    ->leftJoin('users AS u', 'u.id', '=', 'ua.trainer_id')
                    ->leftJoin('users AS student', 'student.id', '=', 'ua.user_id')
                    ->join('labor_areas AS la', 'la.id', '=', 'student.labor_area_id')
                    ->groupBy('ua.id', 'c.name', 'c.location', 'c.start_date', 'ua.trainer_id', 'u.name', 'u.lastname','student.name', 'student.lastname', 'student.document_number', 'user_workspace', 'student.email')
                    ->get();
    return $query;
    }

}
