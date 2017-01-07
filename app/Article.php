<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title','body','user_id','comments_id','votes_id'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
