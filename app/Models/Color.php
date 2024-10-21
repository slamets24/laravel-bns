<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_product'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
