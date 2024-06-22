<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreatedUser;
use App\Models\Genders;
use App\Models\Profiles;
use App\Models\LaborAreas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;


class UsersImport implements ToModel, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $random_password = Str::random(16);

        $gender = Genders::where('name', $row['gender'])->first();
        $profile = Profiles::where('name', $row['profile'])->first();
        $labor_area = LaborAreas::where('name', $row['labor_area'])->first();

        $user = User::where('email', $row['email'])->orWhere('document_number', $row['document_number'])->first();
        return new User([
            'name' => $row['name'],
            'lastname' => $row['lastname'],
            'document_number' => $row['document_number'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'gender_id' => $gender->id,
            'labor_area_id' => $labor_area->id,
            'profile_id' => $profile->id,
            'password' => Hash::make($random_password),
            'remember_token' => Str::random(60),
            'active' =>  1,
        ]);
    }
}
