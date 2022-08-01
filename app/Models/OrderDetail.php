<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $order_id
 * @property string $product_id
 * @property string $qty
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 */
class OrderDerail extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'product_id', 'qty', 'price', 'created_at', 'updated_at'];

    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function shoppingCart(){
        return $this->hasMany(ShoppingCart::class);
    }
}
