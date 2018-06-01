<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CommentResource;
use App\Http\Requests\Api\Comment\StoreRequest;
use App\Http\Requests\Api\Comment\UpdateRequest;
use App\Article;
use App\Comment;
use Auth;
class CommentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api')->except('index', 'show');
	}

    public function index($article)
    {
    	$art      = Article::where('id', $article)->where('status', 1)->firstOrFail();
    	$comments = Comment::where('article_id', $art->id)->paginate(10);
    	return CommentResource::collection($comments);
    }

    public function show($article, $id)
    {
    	$art      = Article::where('id', $article)->where('status', 1)->firstOrFail();
    	$comment  = Comment::findOrFail($id);
    	return new CommentResource($comment);
    }


    public function store($article, StoreRequest $request)
    {
    	$art     = Article::where('id', $article)->where('status', 1)->firstOrFail();
    	$comment = comment::create([
    		'user_id'    => Auth::id(),
    		'article_id' => $art->id,
    		'comment'	 => $request->comment
    	]);
    	return new CommentResource($comment);
    }

    public function update($article, $id, UpdateRequest $request)
    {
    	$comment = Comment::where('article_id', $article)->where('user_id', Auth::id())->firstOrFail();
    	$comment->update($request->only('comment'));
    	return new CommentResource($comment);
    }

    public function destroy($article, $id)
    {
    	$comment = Comment::where('article_id', $article)->where('user_id', Auth::id())->firstOrFail();
    	$comment->delete();
    	return response()->json(null, 204);
    }
}
