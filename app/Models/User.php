<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = true;
    protected $fillable = [
        'email', 'password', 'provider', 'provider_id'
    ];
}
