<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VatStatement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'unit',
        'price',
        'vat',
    ];
}
