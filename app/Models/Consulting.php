<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulting extends Model
{
    protected $table = 'consulting';
    protected $primaryKey = 'consulting_id';
    public $timestamps = true;
    public function Center()
    {
        return $this->belongsTo('App\Models\Center','center_id');
    }
}
