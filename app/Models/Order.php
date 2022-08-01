<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $user_id
 * @property string $address
 * @property string $tel
 * @property integer $total
 * @property integer $fare
 * @property integer $pay_method
 * @property integer $pay_status
 * @property integer $transport
 * @property string $order_number
 * @property string $created_at
 * @property string $updated_at
 */
class Order extends Model
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
    protected $fillable = ['user_id', 'address', 'tel', 'total', 'fare', 'pay_method', 'pay_status', 'transport', 'order_number', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
    

}
