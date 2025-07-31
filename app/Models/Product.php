<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'price', 'description', 'is_active', 'vendors', 'status', 'created_by', 'published_date'];

    protected $casts = [
        'vendors' => 'array',
        'is_active' => 'boolean',
        'published_date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function created_by_info()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
