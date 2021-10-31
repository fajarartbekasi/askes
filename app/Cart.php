<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $guarded = [];

    public function produck()
    {
        return $this->belongsTo(Produck::class);
    }
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
