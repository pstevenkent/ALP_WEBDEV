<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Varietal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function coffeebeans(): HasMany
    {
        return $this->hasMany(CoffeeBean::class);
    }
}
