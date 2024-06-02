<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CoffeeBean extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'origin',
        'process',
        'elevation',
        'notes',
        'description',
        'weight',
        'price',
        'stock',
        'availability',
        'producer_id',
        'varietal_id',
        'roasttype_id',
    ];

    public function producer(): BelongsTo
    {
        return $this->belongsTo(Producer::class, 'producer_id');
    }

    public function varietal(): BelongsTo
    {
        return $this->belongsTo(Varietal::class, 'varietal_id');
    }

    public function roasttype(): BelongsTo
    {
        return $this->belongsTo(Roasttype::class, 'roasttype_id');
    }

}
