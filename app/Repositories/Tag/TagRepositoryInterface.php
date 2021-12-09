<?php

namespace App\Repositories\Tag;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

interface TagRepositoryInterface {

    public function getAll() : Collection;

    public function find($id) : Tag;

    public function getAllPosts(Tag $tag, int $pagination = 6) : LengthAwarePaginator;

    public function create(array $data) : Tag;

    public function update(Tag $tag, array $data) : bool;

    public function delete(Tag $tag) : bool;

    public function getAllInArray(Post $post) : array;
}
