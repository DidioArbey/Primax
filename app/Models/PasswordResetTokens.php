<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetTokens extends Model {

    protected $table = 'password_reset_tokens';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];

}
