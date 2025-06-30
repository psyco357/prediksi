<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persembahan extends Model
{
    protected $table = 'persembahan';
    //
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function jenis()
    {
        return $this->belongsTo(JenisPersembahan::class, 'jenis_persembahan_id');
    }
}
