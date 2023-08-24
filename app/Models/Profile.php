<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    //RELACION UNO A UNO A LA INVERSA


    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
