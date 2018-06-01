<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ArticleResource;
use App\Http\Requests\Api\Article\StoreRequest;
use App\Http\Requests\Api\Article\UpdateRequest;
use App\Article;
use Auth;
class ArticleController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api')->except('index', 'show');
	}
    public function index()
    {
    	$articles = Article::where('status', 1)->paginate(10);
    	return ArticleResource::collection($articles);
    }

    public function show($id)
    {
    	$article = Article::where('status', 1)->where('id', $id)->firstOrFail();
    	return new ArticleResource($article);
    }

    public function store(StoreRequest $request)
    {
    	$article = Article::create([
    		'title' => $request->title,
    		'slug'	=> str_slug($request->title),
    		'content' => $request->content,
    		'status' => 1,
    		'user_id' => Auth::id()
    	]);
    	return new ArticleResource($article);
    }

    public function update(UpdateRequest $request, $id)
    {
    	$article = Article::where('id', $id)->where('user_id', Auth::id())->first();
    	if($article){
    		$article->update($request->all());
    		return new ArticleResource($article);
    	}
    	return response(['status', 'error', 'message' => '404 Not found article']);
    }

    public function destroy($id)
    {
    	$article = Article::where('id', $id)->where('user_id', Auth::id())->first();
    	if($article){
    		$article->delete();
    		return response(null, 204);
    	}
    	return response(['status', 'error', 'message' => '404 Not found article']);
    }
}
