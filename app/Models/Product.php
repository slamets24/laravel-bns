<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'url_shopee',
        'url_tokped',
        'url_wa',
        'id_url_image',
        'id_color',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function colors()
    {
        return $this->hasMany(color::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
