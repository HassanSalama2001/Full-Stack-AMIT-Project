<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model implements Buyable
{
    use HasFactory;
    protected $guarded = '';
    protected $fillable = [
        'categories_id', 'name', 'price', 'quantity', 'image'
    ];
    public function Categories()
    {
        return $this->hasOne(Categories::class);
    }
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }

    public function getBuyablePrice($options = null)
    {
        // if ((!is_null($this->sale_price) && $this->price > $this->sale_price)) {
        //     return $this->sale_price;
        // }
        return $this->price;
    }
}
