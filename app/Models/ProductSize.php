<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $table = 'product_sizes';

    protected $fillable = [
        'product_id', 'color_id', 'size_id', 'quantity',
    ];

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function color()
    {
        return $this->belongsToMany(Color::class, 'color_id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_id', 'id');
    }
}
