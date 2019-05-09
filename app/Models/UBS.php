<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UBS extends Model
{
    protected $fillable = [
        'name',
        'administrator_id',
        'disabled'
    ];

    public function administrator() {
        return $this->belongsTo(User::class, 'administrator_id');
    }
}
