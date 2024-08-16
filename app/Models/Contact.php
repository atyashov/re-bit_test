<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'surname',
        'phone'
    ];

    public function setPhoneAttribute(string $value) {
        $this->attributes['phone'] = preg_replace("/[^0-9]/", "", $value);
    }

    public function applications() {
        return $this->hasMany('App\Models\Application');
    }
}
