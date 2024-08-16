<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Manager extends User
{
    use HasFactory;

    protected $fillable = [
        'login',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }
}
