<?php
/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 09/05/19
 * Time: 01:06
 */

namespace App\Http\Controllers;

use App\Commands\UBS\RegisterUBSCommand;
use App\Models\UBS;
use Illuminate\Http\Request;

class UBSController extends Controller
{
    private $registerCommand;

    /**
     * UBSController constructor.
     * @param RegisterUBSCommand $command
     */
    public function __construct(RegisterUBSCommand $command)
    {
        $this->registerCommand = $command;
    }

    public function index($cityCode) {
        $ubs = UBS::where('city_code', $cityCode)->get();
        return $this->successResponse($ubs);
    }

    public function show($ubsID) {
        $ubs = UBS::findOrFail($ubsID);
        return $this->successResponse($ubs);
    }

    /**
     * @param Request $request
     * @return \App\Traits\Responder|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Request $request) {
        return $this->registerCommand->handler($request);
    }
}