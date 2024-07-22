<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_item';
    protected $fillable = ['cart_id', 'fruit_id', 'quantity', 'order_id'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function fruit() {
        return $this->belongsTo(Fruits::class, 'fruit_id');
    }

    public function billings()
    {
        return $this->belongsTo(Billings::class);
    }
}
