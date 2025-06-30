<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    //
    public function persembahans()
    {
        return $this->hasMany(Persembahan::class);
    }
}
