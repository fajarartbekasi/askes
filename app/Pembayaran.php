<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
