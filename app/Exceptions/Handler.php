<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Exception $e, $request) {
            if($e instanceof TokenBlacklistedException){
                return response(['error' => 'You should get new token...'], Response::HTTP_BAD_REQUEST);
            } else if($e instanceof TokenInvalidException){
                return response(['error' => 'Token is invalid.'], Response::HTTP_BAD_REQUEST);
            } else if($e instanceof TokenExpiredException){
                return response(['error' => 'Token is expired.'], Response::HTTP_BAD_REQUEST);
            } else if($e instanceof JWTException){
                return response(['error' => 'Token is not provided.'], Response::HTTP_BAD_REQUEST);
            } 
        });
    }
}
