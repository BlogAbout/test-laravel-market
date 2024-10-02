<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @package App\Models
 *
 * @property int|null id
 * @property string name
 * @property string|null description
 * @property double|null cost
 * @property double|null cost_old
 * @property int|null author_id
 * @property string status
 * @property int|null in_stoke
 * @property string|null meta_title
 * @property string|null meta_description
 * @property \Carbon\Carbon|null receipt_at
 * @property \Carbon\Carbon|null created_at
 * @property \Carbon\Carbon|null updated_at
 * @property \Carbon\Carbon|null deleted_at
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tlm_products';

    protected $fillable = [
        'name',
        'description',
        'cost',
        'cost_old',
        'author_id',
        'status',
        'in_stoke',
        'meta_title',
        'meta_description',
        'receipt_at'
    ];

    protected $attributes = [
        'name' => '',
        'description' => '',
        'cost' => 0,
        'cost_old' => 0,
        'author_id' => null,
        'status' => 'publish',
        'in_stoke' => 0,
        'meta_title' => '',
        'meta_description' => '',
        'receipt_at' => null
    ];

    protected $dates = ['receipt_at'];

    protected $casts = [
        'cost' => 'double',
        'cost_old' => 'double'
    ];
}
