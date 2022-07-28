<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $describe
 * @property integer $price
 * @property integer $amount
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends Model
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
    protected $fillable = ['name', 'describe', 'price', 'amount', 'created_at', 'updated_at'];

    //做一對多的關連到productImg(產品圖片)
    public function imgs() //產生關聯我要叫甚麼明子 EX:$product->imgs
    {
        //hasMany 三個參數 (我要關聯的model ,關聯過去的欄位,自己表的欄位)
        return $this->hasMany(ProductImg::class,'product_id','id');
    }
}
