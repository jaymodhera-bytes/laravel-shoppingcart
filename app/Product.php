<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'image_url'
    ];

    public function orders(){
        return $this->hasMany(OrderItem::class);
    }
}
