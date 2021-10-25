<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Inventory
 * @package App\Models
 * @version October 25, 2021, 1:21 am UTC
 *
 * @property string $product
 * @property integer $stocks
 * @property number $price
 */
class Inventory extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'inventory';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'product',
        'stocks',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product' => 'string',
        'stocks' => 'integer',
        'price' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product' => 'required|string|max:255',
        'stocks' => 'required|integer',
        'price' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
