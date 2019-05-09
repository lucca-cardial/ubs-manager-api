<?php
/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 09/05/19
 * Time: 02:24
 */

namespace App\Commands\Doctor;


use App\Commands\User\RegisterUserCommand;
use App\Contracts\IRequestCommandHandle;
use App\Models\Doctor;
use App\Traits\Responder;
use Illuminate\Http\Request;

class RegisterDoctorCommand implements IRequestCommandHandle
{
    use Responder;
    private $validator;
    private $registerUserCommand;

    /**
     * RegisterDoctorCommand constructor.
     * @param $validator
     */
    public function __construct(DoctorValidator $validator, RegisterUserCommand $registerUserCommand)
    {
        $this->validator = $validator;
        $this->registerUserCommand = $registerUserCommand;
    }


    public function handler(Request $request)
    {
        $this->validator->pass($request->all());
        $user = $this->registerUserCommand->handler($request);

        $doctor = Doctor::create([
            'crm' => $request->input('crm'),
            'ubs_id' => $request->input('ubs'),
            'speciality_id' => $request->input('speciality')
        ]);

        $doctor->user()->associate($user);
        $doctor->save();
        return $doctor;
    }
}