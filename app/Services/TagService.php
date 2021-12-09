<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Tag\TagEloquentRepository;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class TagService {

    protected $repository;

    public function __construct(TagEloquentRepository $tagRepository)
    {
        $this->repository = $tagRepository;
    }

    public function getAll() : Collection
    {
        return $this->repository->getAll();
    }

    public function find($id) : Tag
    {
        return $this->repository->find($id);
    }

    public function getAllPosts(Tag $tag, int $pagination = 6) : LengthAwarePaginator
    {
        return $this->repository->getAllPosts($tag);
    }

    public function create(array $data) : Tag
    {
        return $this->repository->create($data);
    }

    public function update(Tag $tag, array $data) : bool
    {
        return $this->repository->update($tag, $data);
    }

    public function delete(Tag $tag) : bool
    {
        return $this->repository->delete($tag);
    }

    public function getAllInArray(Post $post) : array
    {
        return $this->repository->getAllInArray($post);
    }
}
