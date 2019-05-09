<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'crm',
        'inVacation',
        'ubs_id',
        'speciality_id',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
