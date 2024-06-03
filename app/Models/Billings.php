<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billings extends Model
{
    use HasFactory;
    protected $table = 'billings';
    protected $fillable = ['full_name', 'city_id', 'cart_id', 'address', 'phone', 'email', 'note', 'payment_method_id'];

    public function cartItem()
    {
        return $this->hasMany(CartItem::class);
    }
}
