<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = false;

    public function colors() {
        return $this->belongsToMany(Color::class, 'color_products');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
}
