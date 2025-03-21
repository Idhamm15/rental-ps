<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_product_id',
        'name',
        'image',
        'price',
        'description'
    ];

    public function category_product()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}
