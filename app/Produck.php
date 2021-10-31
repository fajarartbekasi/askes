<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produck extends Model
{
    protected $table = 'producks';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
