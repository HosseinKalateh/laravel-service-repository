<?php

namespace App\Services;

use App\Repositories\Category\CategoryEloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService {

    protected $repository;

    public function __construct(CategoryEloquentRepository $categoryRepository) {
        $this->repository = $categoryRepository;
    }

    public function getAll() : Collection
    {
        return $this->repository->getAll();
    }

    public function find($id) : Category
    {
        return $this->repository->find($id);
    }

    public function getAllPosts(Category $category, int $pagination = 6) : LengthAwarePaginator
    {
        return $this->repository->getAllPosts($category);
    }

    public function create(array $data) : Category
    {
        return $this->repository->create($data);
    }

    public function update(Category $category, array $data) : bool
    {
        return $this->repository->update($category, $data);
    }

    public function delete(Category $category) : bool
    {
        return $this->repository->delete($category);
    }

}
