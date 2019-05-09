<?php
namespace App\Contracts;

use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: cardial
 * Date: 08/05/19
 * Time: 23:43
 */

interface IRequestCommandHandle
{
    public function handler(Request $request);
}