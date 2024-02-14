<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->hasOne(Category::class);
    }

    public function sales() {
        return $this->hasMany(Sale::class);
    }
}
