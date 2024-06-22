<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Courses;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize {

    public function headings(): array {

        $headers = [
            'COD',
            'NOMBRES',
            'APELLIDOS',
            'DOCUMENTO DE IDENTIDAD',
            'ÁREA LABORAL',
            'EMAIL',
            'PERFIL',
            'ESTADO',
            '# DE RUTAS DE APRENDIZAJE',
            'RUTAS DE APRENDIZAJE',
            'ESTADO',
            'FECHA DE INICIO RUTA',
            'FECHA DE FINALIZACIÓN RUTA',
            '# DE CURSOS',
            'CURSOS',
            'ESTADO',
            'FECHA DE INICIO CURSO',
            'FECHA DE FINALIZACIÓN CURSO',
        ];

        return $headers;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {

        $query = DB::table('users AS u')
        ->select('u.id', 'u.name', 'u.lastname', 'u.document_number', 'la.name as workplace', 'u.email', 'p.name as profile_name', 'u.active',
                DB::raw('(SELECT COUNT(0) FROM progress_user_learning_paths WHERE user_id = u.id) AS count_learning_paths'),
                DB::Raw('IFNULL( lp.name , " ") as name_learning_path'),
                DB::Raw('IFNULL( s.name , " ") as state_learning_path'),
                DB::Raw('IFNULL( pulp.start_date , " ") as start_learning_path'),
                DB::Raw('IFNULL( pulp.end_date , " ") as end_learning_path'),
                DB::raw('(SELECT COUNT(0) FROM progress_user_courses WHERE user_id = u.id) AS count_user_courses'),
                'c.name as name_course', 'st.name as state_course', 'puc.start_date as start_course', 'puc.end_date as end_course'
                )
        ->join('labor_areas AS la', 'la.id', '=', 'u.labor_area_id')
        ->join('profiles AS p', 'p.id', '=', 'u.profile_id')
        ->leftJoin('progress_user_learning_paths AS pulp', 'pulp.user_id', '=', 'u.id')
        ->leftJoin('learning_paths AS lp', 'lp.id', '=', 'pulp.learning_path_id')
        ->leftJoin('states AS s', 's.id', '=', 'pulp.state_id')
        ->leftJoin('progress_user_courses AS puc', 'puc.user_id', '=', 'u.id')
        ->leftJoin('courses AS c', 'c.id', '=', 'puc.course_id')
        ->leftJoin('states AS st', 'st.id', '=', 'puc.state_id')
        ->where('u.profile_id', 3)
        ->orderby('u.id', 'ASC')
        ->get();
    return $query;
    }


}
