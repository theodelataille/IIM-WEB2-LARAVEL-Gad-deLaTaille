<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Get the comments for the blog post.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function test() {
        return 'hello';
    }

    public function likedArticles() {
    return $this->morphedByMany('App\Article', 'likeable')->whereDeletedAt(null);
    }
}
