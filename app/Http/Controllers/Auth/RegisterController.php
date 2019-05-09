<?php

namespace App\Http\Controllers\Auth;

use App\Commands\User\RegisterUserCommand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller {

    private $registerCommand;

    /**
     * RegisterController constructor.
     * @param $userCommand
     */
    public function __construct(RegisterUserCommand $userCommand)
    {
        $this->registerCommand = $userCommand;
    }

    /**
     * @param Request $request
     * @return \App\Traits\Responder|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function register(Request $request) {
        $this->registerCommand->handler($request);
        return $this->successResponse('Usuário registrado com sucesso! Por favor, efetue login');
    }
}