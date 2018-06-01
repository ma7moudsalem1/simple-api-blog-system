<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
    	'article_id', 'user_id', 'comment'
    ];

    public function article()
    {
    	return $this->belongsTo('App\Article', 'article_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function getCreatedByAttribute()
    {
    	return isset($this->user->name) ? $this->user->name : null;
    }

    public function getArticleLinkAttribute()
    {
    	return isset($this->article->id) ? route('articles.show', $this->article->id) : null;
    }
}
