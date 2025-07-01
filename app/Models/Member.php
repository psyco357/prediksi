<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $fillable = [
        'namalengkap',
        'namabaptis',
        'jekel',
        'tempatlahir',
        'tgllahir',
        'notelp',
        'email',
        'alamat',
    ];
    //
    public function persembahans()
    {
        return $this->hasMany(Persembahan::class);
    }
}
