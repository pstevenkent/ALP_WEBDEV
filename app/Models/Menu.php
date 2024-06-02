<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

