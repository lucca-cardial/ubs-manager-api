<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UBS extends Model
{
    protected $table = 'ubs';
    protected $fillable = [
        'name',
        'administrator_id',
        'street',
        'street_number',
        'neighborhood',
        'city_code',
        'lat',
        'lng',
        'disabled'
    ];

    public function administrator() {
        return $this->belongsTo(User::class, 'administrator_id');
    }
}
