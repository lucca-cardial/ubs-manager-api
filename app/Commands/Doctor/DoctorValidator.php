<?php
/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 09/05/19
 * Time: 02:22
 */

namespace App\Commands\Doctor;


use App\Abstracts\ValidatorAbstract;

class DoctorValidator extends ValidatorAbstract
{
    public function rules()
    {
        return [
            'crm' => 'required|string|unique:doctors,crm',
            'ubs' => 'required|exists:ubs,id',
            'speciality' => 'required|exists:specialities,id'
        ];
    }
}