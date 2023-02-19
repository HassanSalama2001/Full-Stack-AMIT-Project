<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id', 'state'
    ];
    public function shoppingcart()
    {
        return $this->hasMany(shoppingcart::class);
    }
}
