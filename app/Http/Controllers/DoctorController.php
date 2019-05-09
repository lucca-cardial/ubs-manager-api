<?php

namespace App\Http\Controllers;

use App\Commands\Doctor\RegisterDoctorCommand;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function index($ubsID) {
        $doctors = Doctor::where('ubs_id', $ubsID)->get();
        return $this->successResponse($doctors);
    }

    public function show($doctorID) {
        $doctor = Doctor::findOrFail($doctorID);
        return $this->successResponse($doctor);
    }

    /**
     * @param Request $request
     * @return \App\Traits\Responder|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->registerCommand->handler($request);
        return $this->successResponse([
            'success' => 'Doutor(a) cadastrado(a) com sucesso!',
            Response::HTTP_CREATED
        ]);
    }

}
