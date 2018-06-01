<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
trait ExceptionTrait
{
	public function apiException($request,$e)
	{
		if ($this->isModel($e)) {
            return $this->ModelResponse($e);
        }
	    if ($this->isHttp($e)) {
	        return $this->HttpResponse($e);
	    }
	    if($this->isMethodNotAllowed($e)){
	        return $this->MethodNotAllowed($e);
	    }
	  	return parent::render($request, $e);
	}
	protected function isModel($e)
	{
		return $e instanceof ModelNotFoundException;
	}
	protected function isHttp($e)
	{
		return $e instanceof NotFoundHttpException; 
	}

	protected function isMethodNotAllowed($e)
	{
		return $e instanceof MethodNotAllowedHttpException;
	}
	protected function ModelResponse($e)
	{
		return response()->json([ 'errors' => 'Model not found' ],404);
	}
	protected function HttpResponse($e)
	{
		return response()->json(['errors' => 'Page Not Found'],404);
	}

	protected function MethodNotAllowed($e)
	{
		return response()->json(['errors' => 'Method Not Allowd'],404);
	}
}