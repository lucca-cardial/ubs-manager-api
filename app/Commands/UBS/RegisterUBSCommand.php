<?php
namespace App\Commands\UBS;
use App\Contracts\IRequestCommandHandle;
use App\Models\UBS;
use App\Traits\Responder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 09/05/19
 * Time: 01:15
 */

class RegisterUBSCommand implements IRequestCommandHandle
{
    use Responder;
    private $validator;

    /**
     * RegisterUBSCommand constructor.
     * @param $validator
     */
    public function __construct(RegisterUBSValidator $validator)
    {
        $this->validator = $validator;
    }

    public function handler(Request $request)
    {
        $this->validator->pass($request->all());

        $ubs = UBS::create([
            'name' => $request->input('name'),
            'administrator_id' => $request->input('administrator_id'),
            'street' => $request->input('street'),
            'street_number' => $request->input('street_number'),
            'neighborhood' => $request->input('neighborhood'),
            'city_code' => $request->input('city_code'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng')
        ]);

        return $ubs;

    }
}