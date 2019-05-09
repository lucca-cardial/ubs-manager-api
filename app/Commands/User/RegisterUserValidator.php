<?php
namespace  App\Commands\User;

use App\Abstracts\ValidatorAbstract;

/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 08/05/19
 * Time: 23:51
 */

class RegisterUserValidator extends ValidatorAbstract
{
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:130',
            'password' => 'required|min:6|max:12',
            'confirm_password' => 'required|same:password'
        ];
    }
}