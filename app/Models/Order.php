<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'address', 'country', 'region', 'postal_code'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
