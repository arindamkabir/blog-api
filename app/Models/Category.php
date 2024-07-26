<?php

namespace App\Models;

use App\Traits\WithGeneratedUniqueSlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Category extends Model
{
    use WithGeneratedUniqueSlugTrait, HasFactory;

    // Relationships

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function impressions(): MorphMany
    {
        return $this->morphMany(Impression::class, 'impressionable');
    }
}
