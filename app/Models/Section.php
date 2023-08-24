<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    //RELACION UNO A MUCHOS NORMAL
    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }


    // RELACION UNO A MUCHOS INVERSA
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
