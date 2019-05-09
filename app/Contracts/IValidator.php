<?php
/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 08/05/19
 * Time: 23:51
 */
namespace App\Contracts;
interface IValidator
{
    public function pass(array $data);
    public function rules();
    public function messages();
}