<?php

namespace App\Services;

use App\Repositories\Post\PostEloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService {

    protected $postRepository;

    public function __construct(PostEloquentRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll() : Collection
    {
        return $this->postRepository->getAll();
    }

    public function paginate($limit = 6) : LengthAwarePaginator
    {
        return $this->postRepository->paginate($limit);
    }

    public function find($id) : Post
    {
        return $this->postRepository->find($id);
    }

    public function create(array $data) : Post
    {
        // TODO :: resize image

        // Store image
        $image = $data['image']->store('/public/posts/images');

        // Make image full url
        $imageURL = str_replace('public', 'storage', $image);

        $postData = [
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'image' => $imageURL
        ];

        // Save Post
        $post = $this->postRepository->create($postData);

        // Save Post Tags
        $this->postRepository->savePostTags($post, $data['tags_id']);

        return $post;
    }

    public function update(Post $post, array $data) : bool
    {
        if (isset($data['image'])) {
            // Delete last image
            $imagePath = str_replace('storage/', '/app/public/', $post->image);

            unlink(storage_path($imagePath));

            // Save new image
            $image = $data['image']->store('/public/posts/images');

            // Make image full url
            $imageURL = str_replace('public', 'storage', $image);
        } else {
            $imageURL = $post->image;
        }

        $postData = [
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'image' => $imageURL
        ];

        // Update Post
        $this->postRepository->update($post, $postData);

        // Update Post Tags
        $this->postRepository->syncTags($post, $data['tags_id']);

        return true;
    }

    public function delete(Post $post) : bool
    {
        // Delete post image
        $imagePath = str_replace('storage/', '/app/public/', $post->image);
        unlink(storage_path($imagePath));

        // Delete post tags
        $this->postRepository->deletePostTags($post);

        // Delete post
        return $this->postRepository->delete($post);
    }
}
