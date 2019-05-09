<?php
namespace App\Commands\UBS;
use App\Abstracts\ValidatorAbstract;

/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 09/05/19
 * Time: 01:16
 */

class RegisterUBSValidator extends ValidatorAbstract
{
    public function rules()
    {
        return [
            'name' => 'required|max:160',
            'administrator_id' => 'nullable|exists:users,id',
            'street' => 'required|string|max:160',
            'street_number' => 'required|string|max:10',
            'neighborhood' => 'required|string|max:200',
                'city_code' => 'required|in:1702109'
        ];
    }
}