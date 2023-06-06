<?php

namespace App\Exceptions;

<<<<<<< HEAD
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
=======
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

class Handler extends ExceptionHandler
{
    /**
<<<<<<< HEAD
     * A list of the exception types that are not reported.
=======
     * A list of the exception types that should not be reported.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @var array
     */
    protected $dontReport = [
<<<<<<< HEAD
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
=======
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    ];

    /**
     * Report or log an exception.
     *
<<<<<<< HEAD
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
=======
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
=======
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        return parent::render($request, $e);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
