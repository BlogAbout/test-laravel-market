<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderItem
 *
 * @package App\Models
 *
 * @property int|null id
 * @property int|null order_id
 * @property int|null product_id
 * @property int|null qty
 * @property double|null cost
 * @property double|null sum
 * @property \Carbon\Carbon|null created_at
 * @property \Carbon\Carbon|null updated_at
 */
class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'tlm_order_items';

    public $incrementing = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'cost',
        'sum'
    ];

    protected $attributes = [
        'order_id' => null,
        'product_id' => null,
        'qty' => 0,
        'cost' => 0,
        'sum' => 0
    ];

    protected $casts = [
        'cost' => 'double',
        'sum' => 'double'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
