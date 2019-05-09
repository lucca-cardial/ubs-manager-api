<?php
namespace App\Traits;
use Illuminate\Http\Response;

/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 08/05/19
 * Time: 23:15
 */

trait Responder
{
    /**
     * @param $data
     * @param int $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response|Responder
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code) {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * @param $error
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function notifyError($error, $code = Response::HTTP_BAD_REQUEST) {
        return response()->json([
            'notify_error' => [
                'error' => $error,
                'code' => $code
            ]
        ], $code);
    }
}