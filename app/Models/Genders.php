<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genders extends Model {

    protected $table = 'genders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];

}
