<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentsresource extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function studentsresourceable(){
        return $this->morphTo();
    }



}
