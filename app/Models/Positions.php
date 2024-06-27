<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model {

    protected $table = 'positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

}
