<?php

namespace App\Repositories\Category;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryRepositoryInterface {

    public function getAll() : Collection;

    public function find($id) : Category;

    public function getAllPosts(Category $category, int $pagination = 6) : LengthAwarePaginator;

    public function create(array $data) : Category;

    public function update(Category $category, array $data) : bool;

    public function delete(Category $category) : bool;
}
