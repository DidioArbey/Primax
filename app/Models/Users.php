<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

    protected $table = 'users';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'profile_id',
        'name',
        'lastname',
        'nickname',
        'document_number',
        'phone',
        'email',
        'gender_id',
        'password',
        'labor_area_id',
        'positions_id',
        'country_id',
        'business_line_id',
        'company_id',
        'state_id',
        'remember_token',
        'active	',
        'created_by_user_id',
        'updated_by_user_id',
        'created_at',
        'updated_at'
    ];

}
