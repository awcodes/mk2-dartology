<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Routine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'targets',
        'goal',
        'instructions',
        'form',
        'published',
    ];

    public function scopeFiterPublished(Builder $query): Builder
    {
        return $query->wherePublished(true);
    }

    public function scopeRandom(Builder $query): Builder
    {
        return $query->inRandomOrder();
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }
}
