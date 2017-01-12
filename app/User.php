<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'is_admin', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loves()
    {
        return $this->hasMany(Love::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vote()
    {
        return $this->belongsToMany(Article::class, 'votes')->withTimestamps();
    }

    /**
     * @param $article
     * @return array
     */
    public function votethis($article)
    {
        return $this->vote()->toggle($article);
    }

    /**
     * @param $article
     * @return mixed
     */
    public function voted($article)
    {
        return $this->vote()->where('article_id', $article)->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userlove()
    {
        return $this->belongsToMany(Article::class, 'love')->withTimestamps();
    }

    /**
     * @param $article
     * @return array
     */
    public function userlovethis($article)
    {
        return $this->userlove()->toggle($article);
    }

    /**
     * @param $article
     * @return mixed
     */
    public function userloved($article)
    {
        return $this->userlove()->where('article_id', $article)->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     *
     */
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($user) {
            $user->comments()->delete();
            $user->notifications()->delete();
            $user->loves()->delete();
            $user->votes()->delete();
        });
    }
}
