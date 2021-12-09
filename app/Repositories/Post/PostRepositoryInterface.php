<?php

namespace App\Repositories\Post;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Post;

interface PostRepositoryInterface {

    public function getAll() : Collection;

    public function paginate($limit = 6) : LengthAwarePaginator;

    public function find($id) : Post;

    public function create(array $data) : Post;

    public function savePostTags(Post $post, array $tags) : bool;

    public function update(Post $post, array $data) : bool;

    public function syncTags(Post $post, array $tags) : bool;

    public function deletePostTags(Post $post) : bool;

    public function delete(Post $post) : bool;
}
