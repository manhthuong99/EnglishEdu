<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = 'english_center';
    protected $primaryKey = 'center_id';
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function province(){
        return $this->belongsTo('App\Models\Province','user_id');
    }
}
