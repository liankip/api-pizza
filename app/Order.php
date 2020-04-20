<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['code', 'user_id', 'items', 'address', 'subtotal', 'total'];

    function user() {
		return $this->belongsTo('App\User');
    }
}
