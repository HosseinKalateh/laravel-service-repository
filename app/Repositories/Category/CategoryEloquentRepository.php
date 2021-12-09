<?php

namespace App\Repositories\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryEloquentRepository implements CategoryRepositoryInterface {

    public function getAll() : Collection
    {
        return Category::latest()->get();
    }

    public function find($id) : Category
    {
        return Category::findOrFail($id);
    }

    public function getAllPosts(Category $category, int $pagination = 6) : LengthAwarePaginator
    {
        return $category->posts()->latest()->paginate($pagination);
    }

    public function create(array $data) : Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data) : bool
    {
        return $category->update($data);
    }

    public function delete(Category $category) : bool
    {
        return $category->delete();
    }
}
