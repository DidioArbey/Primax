<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Courses;

class UsersAssessmentsExport implements FromCollection, WithHeadings, ShouldAutoSize {

    public function headings(): array {

        $headers = [
            'COD',
            'EVALUACIÓN',
            'CURSO',
            'RUTA DE APRENDIZAJE',
            // '# EVALUADOS',
            // '# APROBADOS',
            // '# NO APROBADOS',
            // '% APROBADOS',
            // '% NO APROBADOS',
            'EVALUADO/A',
            'DOCUMENTO DE IDENTIDAD',
            'EMAIL',
            'ÁREA LABORAL',
            'PUNTAJE',
            'ESTADO',
        ];

        return $headers;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {
        $query = DB::table('assessments AS a')
                ->select('a.id', 'a.name as assessment_name', 'c.name as course_name', 'lp.name as learning_path_name',
                        // DB::raw('COUNT(DISTINCT ua.user_id) AS users_evaluated'),
                        // DB::raw('(SELECT COUNT(DISTINCT user_id) FROM user_assessments WHERE ((assessment_id = a.id) AND (approve = 1))) AS user_approved_count'),
                        // DB::raw('(COUNT(DISTINCT ua.user_id) - (SELECT COUNT(DISTINCT user_assessments.user_id) FROM user_assessments WHERE ((user_assessments.assessment_id = a.id) AND (user_assessments.approve = 1)))) AS user_not_approved_count'),
                        // DB::raw('(((SELECT COUNT(DISTINCT user_assessments.user_id) FROM user_assessments WHERE ((user_assessments.assessment_id = a.id) AND (user_assessments.approve = 1))) / COUNT(DISTINCT ua.user_id)) * 100) AS percentage_approved'),
                        // DB::raw('(((COUNT(DISTINCT ua.user_id) - (SELECT COUNT(DISTINCT user_assessments.user_id) FROM user_assessments WHERE ((user_assessments.assessment_id = a.id) AND (user_assessments.approve = 1)))) / COUNT(DISTINCT ua.user_id)) * 100) AS percentage_not_approved'),
                        DB::raw('CONCAT(u.name, " ", u.lastname) as student'),'u.document_number', 'u.email', 'la.name as workplace', 'ua.result',
                        DB::raw('(CASE WHEN ua.approve = 1 THEN "Aprobado/a" ELSE  "No Aprobado/a" END) AS state')
                        )
                ->join('user_assessments AS ua', 'ua.assessment_id', '=', 'a.id')
                ->leftJoin('courses AS c', 'c.id', '=', 'a.course_id')
                ->leftJoin('learning_paths AS lp', 'lp.id', '=', 'a.learning_path_id')
                ->leftJoin('users AS u', 'u.id', '=', 'ua.user_id')
                ->leftJoin('labor_areas as la','la.id', '=', 'u.labor_area_id')
                ->groupBy('a.id','a.name','c.name','lp.name', 'student', 'u.document_number',  'u.email', 'la.name', 'result', 'state')
                ->get();
    return $query;
    }

}
