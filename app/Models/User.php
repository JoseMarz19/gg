<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

//RELACION UNO A UNO
    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }

//RELACION UNO A MUCHOS

    public function courses_dictated(){
        return $this->hasMany('App\Models\Course');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }




    public function reactions(){
        return $this->hasMany('App\Models\Reaction');
    }

//RELACION UNO A UNO POLIMORFICA
      public function studentsresource(){
        return $this->morphMany('App\Models\Studentsresource', 'studentsresourceable');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
    }


//RELACION MUCHOS A MUCHIS

    public function courses_enrolled(){
        return $this->belongsToMany('App\Models\Course');
    }

    public function lessons(){
        return $this->belongsToMany('App\Models\Lesson');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user');
    }
}
