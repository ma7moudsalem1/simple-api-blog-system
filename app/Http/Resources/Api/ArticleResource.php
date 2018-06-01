<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class ArticleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'title'    => $this->title,
        'creator'  => $this->created_by,
        'content'  => $this->content,
        'comments' => $this->article_comments
        ];
    }
}
