<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriesFlights extends Model
{
    use HasFactory;

    # Belongs to -------------------------------------------------------------------------------

    public function categories (): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    # Has many ---------------------------------------------------------------------------------- 

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
