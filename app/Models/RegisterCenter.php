<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterCenter extends Model
{
    protected $table = 'register_center';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
