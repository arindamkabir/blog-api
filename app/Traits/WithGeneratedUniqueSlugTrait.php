<?php

declare(strict_types=1);

namespace App\Traits;

trait WithGeneratedUniqueSlugTrait
{
    public static function bootWithGeneratedUniqueSlugTrait(): void
    {
        static::saving(function ($model) {
            if ($model->isDirty('title')) {
                $slug = str()->slug($model->title);
                $count = $model->where('id', '!=', $model->id)
                    ->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")
                    ->count();
                $model->slug = $count ? "{$slug}-{$count}" : $slug;
            }
        });
    }
}
