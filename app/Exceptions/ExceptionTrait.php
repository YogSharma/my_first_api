<?php

namespace App\Exceptions;

use Exception;
use function foo\func;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $e){
        if($this->isModel($e)){
            return $this->modelResponse();
        }
        if($this->isHttp($e)){
            return $this->httpResponse();
        }

        return parent::render($request, $e);
    }

    protected function isModel($e){
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e){
        return $e instanceof NotFoundHttpException;
    }

    protected function modelResponse(){
        return response()->json([
                'errors' => 'Product Model Not Found',
                \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND
            ]
        );
    }

    protected function httpResponse(){
        return response()->json([
                'errors' => 'Incorrrect url',
                \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND
            ]
        );
    }
}
