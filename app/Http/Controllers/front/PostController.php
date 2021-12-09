<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    protected $postService;
    protected $categoryService;
    protected $tagService;

    public function __construct(
        PostService $postService,
        CategoryService $categoryService,
        TagService $tagService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postService->paginate();

        $categories = $this->categoryService->getAll();

        $tags = $this->tagService->getAll();

        return view('front.post.index', compact(['posts', 'categories', 'tags']));
    }

    /**
     * Display a listing of the resource by category
     *
     * @return \Illuminate\Http\Response
     */

    public function categoryPosts($id)
    {
        $category = $this->categoryService->find($id);
        $posts = $this->categoryService->getAllPosts($category);

        $categories = $this->categoryService->getAll();
        $tags = $this->tagService->getAll();

        return view('front.post.index', compact(['category', 'posts', 'categories', 'tags']));
    }

    /**
     * Display a listing of the resource by tag
     *
     * @return \Illuminate\Http\Response
     */

    public function tagPosts($id)
    {
        $tag = $this->tagService->find($id);
        $posts = $this->tagService->getAllPosts($tag);

        $categories = $this->categoryService->getAll();
        $tags = $this->tagService->getAll();

        return view('front.post.index', compact(['tag', 'posts', 'categories', 'tags']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postService->find($id);

        return view('front.post.show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
