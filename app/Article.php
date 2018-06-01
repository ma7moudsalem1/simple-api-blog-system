<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'title', 'slug', 'content', 'status', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id');
    }

    public function getCreatedByAttribute()
    {
    	return isset($this->user->name) ? $this->user->name : null;
    }

    public function getArticleCommentsAttribute()
    {
        return route('comments.index', $this->id);
    }
}
