<?php

namespace App\Http\Controllers;

use App\Commands\Doctor\RegisterDoctorCommand;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $registerCommand;

    /**
     * DoctorController constructor.
     * @param $registerCommand
     */
    public function __construct(RegisterDoctorCommand $registerCommand)
    {
        $this->registerCommand = $registerCommand;
    }

    /**
     * @param Request $request
     * @return \App\Traits\Responder|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->registerCommand->handler($request);
        return $this->successResponse([
            'success' => 'Doutor(a) cadastrado(a) com sucesso!'
        ]);
    }

}
