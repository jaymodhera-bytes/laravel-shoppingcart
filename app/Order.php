<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
	use Notifiable;
    protected $fillable = [
        'email', 'shopping_address1', 'shopping_address2', 'shopping_address3', 'city', 'country_code', 'zip_postal_code' 
    ];

	public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
