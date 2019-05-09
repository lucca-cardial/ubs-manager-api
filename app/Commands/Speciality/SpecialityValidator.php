<?php
/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 09/05/19
 * Time: 03:00
 */

namespace App\Commands\Speciality;


use App\Abstracts\ValidatorAbstract;

class SpecialityValidator extends ValidatorAbstract
{
    public function rules()
    {
        return [
            'name' => 'required|max:40'
        ];
    }
}