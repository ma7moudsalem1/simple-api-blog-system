<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class CommentResource extends Resource
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
            'creator'   => $this->created_by,
            'article'   => $this->article_link,
            'comment'   => $this->comment
        ];
    }
}
