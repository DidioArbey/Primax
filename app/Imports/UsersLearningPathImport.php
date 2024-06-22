<?php

namespace App\Imports;

use App\UserCourses;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;
use App\Models\ProgressUserLearningPaths;


class UsersLearningPathImport implements ToModel, WithHeadingRow {

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row) {
        $user = User::where('document_number',$row['document_number'])->first();
        $userLearningPath = ProgressUserLearningPaths::where('user_id', $user->id)->first();
        return new ProgressUserLearningPaths([
            'user_id' => $user->id,
        ]);
    }

}
