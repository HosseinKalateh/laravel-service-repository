<?php

namespace App\Repositories\Tag;

use App\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class TagEloquentRepository implements TagRepositoryInterface {

    public function getAll() : Collection
    {
        return Tag::latest()->get();
    }

    public function find($id) : Tag
    {
        return Tag::findOrFail($id);
    }

    public function getAllPosts(Tag $tag, int $pagination = 6) : LengthAwarePaginator
    {
        return $tag->posts()->latest()->paginate($pagination);
    }

    public function create(array $data) : Tag
    {
        return Tag::create($data);
    }

    public function update(Tag $tag, array $data) : bool
    {
        return $tag->update($data);
    }

    public function delete(Tag $tag) : bool
    {
        return $tag->delete();
    }

    public function getAllInArray($post) : array
    {
        $tags  = Tag::latest()->get();

        $postTags = array();
        foreach ($post->tags()->get(['id']) as $tag) {
            $postTags[] = $tag->id;
        }

        return $postTags;
    }
}
