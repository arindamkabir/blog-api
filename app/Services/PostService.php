<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function store(array $validated): Post
    {
        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->category_id = $validated['category_id'];
        $post->author_id = auth()->id();
        $post->published_at = $validated['published_at'] ?? null;
        $post->save();

        return $post;
    }

    public function update(Post $post, array $validated): Post
    {
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->category_id = $validated['category_id'];
        $post->published_at = $validated['published_at'] ?? null;
        $post->save();

        return $post;
    }

    public function destroy(Post $post): void
    {
        $post->delete();
    }

    public function restore(Post $post): void
    {
        $post->restore();
    }

    public function forceDelete(Post $post): void
    {
        $post->forceDelete();
    }
}
