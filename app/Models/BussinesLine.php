<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BussinesLine extends Model {

    protected $table = 'business_line';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'code',
        'name',
        'country_id',
        'active',
        'created_at',
        'updated_at'
    ];

}
