<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    public function saleItem() {
        return $this->hasOne(SaleItem::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
