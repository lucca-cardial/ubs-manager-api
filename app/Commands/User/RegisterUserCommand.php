<?php
namespace  App\Commands\User;
use App\Contracts\IRequestCommandHandle;
use App\Traits\Responder;
use App\User;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 08/05/19
 * Time: 23:42
 */

class RegisterUserCommand implements IRequestCommandHandle
{
    use Responder;
    private $validator;

    /**
     * RegisterUser constructor.
     * @param $validator
     */
    public function __construct(RegisterUserValidator $validator)
    {
        $this->validator = $validator;
    }

    public function handler(Request $request)
    {
        $this->validator->pass($request->all());
        $user = User::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password'))
        ]);

        return $this->successResponse('Usuário registrado com sucesso! Por favor, efetue login');
    }
}