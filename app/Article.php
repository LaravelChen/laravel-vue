<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'body', 'user_id', 'comments_id', 'votes_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userloves()
    {
        return $this->belongsToMany(User::class, 'love')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function love(){
        return $this->hasMany(Love::class);
    }

    /**
     *
     */
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($article) {
            $article->comments()->delete();
            $article->love()->delete();
            $article->votes()->delete();
        });
    }
}
