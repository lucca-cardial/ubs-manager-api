<?php
/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 09/05/19
 * Time: 00:24
 */
namespace App\Abstracts;
use App\Contracts\IValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class ValidatorAbstract implements IValidator
{
    public function pass(array $data) {
        $validator = Validator::make($data, $this->rules(), $this->messages());
        if ($validator->fails())
            throw new ValidationException($validator);
        return true;
    }

    public function rules()  {
        return [];
    }

    public function messages() {
        return [];
    }
}