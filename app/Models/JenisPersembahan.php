<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPersembahan extends Model
{
    protected $table = 'jenispersembahan';
    protected $fillable = [
        "nama_jenis"
    ];
    //
    public function persembahans()
    {
        return $this->hasMany(Persembahan::class, 'jenis_persembahan_id');
    }
}
