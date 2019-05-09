<?php

namespace App\Http\Controllers;

use App\Commands\Speciality\SpecialityCommand;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpecialityController extends Controller
{
    private $specialtyCommand;

    /**
     * SpecialityController constructor.
     * @param $specialtyCommand
     */
    public function __construct(SpecialityCommand $specialtyCommand)
    {
        $this->specialtyCommand = $specialtyCommand;
    }

    public function index() {
        return $this->successResponse(Speciality::all());
    }

    public function show($specialityID) {
        $speciality = Speciality::findOrFail($specialityID);
        return $this->successResponse($speciality);
    }

    public function store(Request $request) {
        $this->specialtyCommand->handler($request);
        return $this->successResponse([
            'success' => "A especialidade {$request->input('name')} foi criada com sucesso",
            Response::HTTP_CREATED
        ]);
    }

}
