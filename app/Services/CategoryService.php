<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function store(array $validated): Category
    {
        $category = new Category();
        $category->title = $validated['title'];
        $category->parent_id = $validated['parent_id'] ?? null;
        $category->save();

        return $category;
    }

    public function update(Category $category, array $validated): Category
    {
        $category->title = $validated['title'];
        $category->parent_id = $validated['parent_id'] ?? null;
        $category->save();

        return $category;
    }

    public function destroy(Category $category): void
    {
        $category->delete();
    }

    public function restore(Category $category): void
    {
        $category->restore();
    }

    public function forceDelete(Category $category): void
    {
        $category->forceDelete();
    }
}
