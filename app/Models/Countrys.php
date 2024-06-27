<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countrys extends Model {

    protected $table = 'countrys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'short_name',
        'created_by_user_id',
        'updated_by_user_id	',
        'created_at',
        'updated_at'
    ];

}
