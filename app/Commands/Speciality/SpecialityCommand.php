<?php
/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 09/05/19
 * Time: 03:01
 */

namespace App\Commands\Speciality;


use App\Contracts\IRequestCommandHandle;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityCommand implements IRequestCommandHandle
{
    private $validator;

    /**
     * SpecialityCommand constructor.
     * @param $validator
     */
    public function __construct(SpecialityValidator $validator)
    {
        $this->validator = $validator;
    }

    public function handler(Request $request)
    {
        $this->validator->pass($request->all());
        $speciality = Speciality::create([
            'name' => $request->input('name')
        ]);

        return $speciality;
    }
}