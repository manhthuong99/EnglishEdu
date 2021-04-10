<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'course_id';
    public $timestamps = true;
    public function center()
    {
        return $this->belongsTo('App\Models\Center','center_id');
    }
}
