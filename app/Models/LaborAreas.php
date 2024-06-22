<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaborAreas extends Model {

    protected $table = 'labor_areas';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'active',
        'created_by_user_id',
        'updated_by_user_id	',
        'created_at',
        'updated_at'
    ];

}
