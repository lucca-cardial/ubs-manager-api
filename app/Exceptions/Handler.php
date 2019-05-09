<?php

namespace App\Exceptions;

use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use App\Traits\Responder;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    use Responder;
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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof HttpException) {
            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];
            return $this->errorResponse($message, $code);
        }

        if($exception instanceof  ModelNotFoundException) {
            $model = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("Não existe registro do modelo {$model} para a busca informada",
                Response::HTTP_NOT_FOUND);
        }

        if($exception instanceof  AuthorizationException) {
            return $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN);
        }

        if($exception instanceof \InvalidArgumentException) {
            return $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
        }

        if($exception instanceof ValidationException) {
            $errors = $exception->validator->errors()->getMessages();
            return $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if($exception instanceof ClientException) {
            $message = $exception->getResponse()->getBody();
            $code = $exception->getCode();
            return $this->errorResponse($message, $code);
        }

        if($exception instanceof QueryException) {
            return $this->errorResponse($exception->errorInfo, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if($exception instanceof \BadMethodCallException){
            $message = $exception->getMessage();
            return $this->errorResponse($message, 500);
        }

        if(env('APP_DEBUG', false))
        {
            return parent::render($request, $exception);
        }

        return $this->errorResponse('Um erro inesperado ocorreu. Tente mais tarde.',
            Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
