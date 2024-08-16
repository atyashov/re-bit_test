<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'phone',
        'ip',
        'contact_id'
    ];

    public function setPhoneAttribute(string $value) {
        $this->attributes['phone'] = preg_replace("/[^0-9]/", "", $value);
    }

    public function contact() {
        return $this->belongsTo('App\Models\Contact');
    }
}

