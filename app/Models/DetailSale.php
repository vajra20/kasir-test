<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class DetailSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_id',
        'products_id',
        'total_product',
        'subtotal'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
