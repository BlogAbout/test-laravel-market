<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 *
 * @package App\Models
 *
 * @property int|null id
 * @property int|null user_id
 * @property double|null tax
 * @property double|null discount
 * @property double|null sum
 * @property double|null total
 * @property int|null delivery_id
 * @property int|null payment_id
 * @property string status
 * @property \Carbon\Carbon|null paid_at
 * @property \Carbon\Carbon|null created_at
 * @property \Carbon\Carbon|null updated_at
 * @property \Carbon\Carbon|null deleted_at
 */
class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tlm_orders';

    protected $fillable = [
        'user_id',
        'tax',
        'discount',
        'sum',
        'total',
        'delivery_id',
        'payment_id',
        'status',
        'paid_at'
    ];

    protected $attributes = [
        'user_id' => null,
        'tax' => 0,
        'discount' => 0,
        'sum' => 0,
        'total' => 0,
        'delivery_id' => null,
        'payment_id' => null,
        'status' => 'new',
        'paid_at' => null
    ];

    protected $dates = ['paid_at'];

    protected $casts = [
        'tax' => 'double',
        'discount' => 'double',
        'sum' => 'double',
        'total' => 'double',
    ];

    public function ordersItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
