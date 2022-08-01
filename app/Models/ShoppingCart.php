<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $product_id
 * @property string $qty
 * @property string $price
 * @property string $user_id
 * @property string $created_at
 * @property string $updated_at
 */
class Shopping_cart extends Model
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
    protected $fillable = ['product_id', 'qty', 'price', 'user_id', 'created_at', 'updated_at'];

    public function user(){
        // belongsTo 事先填寫自己要關聯過去的欄位,在寫對方的
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function product(){

        return $this->hasMany(Product::class,'id','product_id');
    }
    
}
