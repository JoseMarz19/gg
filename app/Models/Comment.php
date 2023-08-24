<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{


    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['comment', 'user_id', 'course_id', 'lesson_id', 'image_path','parent_comment_id'];


    public function commentable(){
        return $this->morphTo();
    }


    //RELACION UNO A MUCHOS INVERSA

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    //RELACION UNO A MUCHOS POLIMORFICA
    public function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction','reactionable');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

}
