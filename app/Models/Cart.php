<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'session_id'];

    public function details()
    {
        return $this->hasMany(CartDetail::class, 'cart_id');
    }
}
