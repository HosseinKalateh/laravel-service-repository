<?php

namespace App\Repositories\Post;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Post;

class PostEloquentRepository implements PostRepositoryInterface {

    public function getAll() : Collection
    {
        return Post::latest()->get();
    }

    public function paginate($limit = 6) : LengthAwarePaginator
    {
        return Post::latest()->paginate($limit);
    }

    public function find($id) : Post
    {
        return Post::findOrFail($id);
    }

    public function create(array $data) : Post
    {
        return Post::create($data);
    }

    public function savePostTags(Post $post, array $tags) : bool
    {
        $post->tags()->attach($tags);

        return true;
    }

    public function update(Post $post, array $data) : bool
    {
        return $post->update($data);
    }

    public function syncTags(Post $post, array $tags) : bool
    {
        $post->tags()->sync($tags);

        return true;
    }

    public function deletePostTags(Post $post) : bool
    {
        $post->tags()->detach();

        return true;
    }

    public function delete(Post $post) : bool
    {
        $post->delete();

        return true;
    }
}
