<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Courses;

class UsersSurveysExport implements FromCollection, WithHeadings, ShouldAutoSize {

    public function headings(): array {

        $headers = [
            'COD',
            'ENCUESTA',
            'ESTADO',
            'CURSO',
            'RUTA DE APRENDIZAJE',
            'ENCUESTADO/A',
            'PROMEDIO DE SATISFACCIÓN'
        ];

        return $headers;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {
        $query = DB::table('surveys AS s')
                ->select('s.id as id_survey', 's.name as name_survey', DB::raw('(CASE WHEN s.active = 1 THEN "Activa" ELSE  "Inactiva" END) AS state'),
                        'c.name as name_course', 'lp.name as name_learning_path',
                        DB::raw('CONCAT(u.name, " ", u.lastname) as student'),
                        DB::raw('CONCAT(ROUND(AVG(us.answer),2), " %") as average_satisfaction')
                        )
                ->leftJoin('courses AS c', 'c.id', '=', 's.course_id')
                ->leftJoin('learning_paths AS lp', 'lp.id', '=', 's.learning_path_id')
                ->leftJoin('user_survey AS us', 'us.survey_id', '=', 's.id')
                ->leftJoin('users AS u', 'u.id', '=', 'us.user_id')
                ->groupBy('s.id', 'name_survey', 'name_course', 'name_learning_path', 's.active', 'student')
                ->get();
    return $query;
    }

}
