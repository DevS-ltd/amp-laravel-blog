<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\Post\ShowPostRequest;
use App\Http\Requests\Post\GetPostsListRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the post.
     *
     * @param  GetPostsListRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(GetPostsListRequest $request)
    {
        $posts = QueryBuilder::for(Post::class)
            ->allowedFilters([
                'title',
            ])
            ->defaultSort('-created_at')
            ->published()
            ->with('author', 'categories')
            ->paginate($request->input('per_page', 12));
        $posts->appends($request->validated())->links();

        return view('posts.list', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display the specified post.
     *
     * @param ShowPostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(ShowPostRequest $request, Post $post)
    {
        return view('posts.item', [
            'post' => $post,
        ]);
    }

    /**
     * Display a posts list by user Id.
     *
     * @param Request $request
     * @param User $author
     * @return \Illuminate\Http\Response
     */
    public function postsByAuthor(Request $request, User $author)
    {
        return view('posts.list', [
            'posts' => QueryBuilder::for(Post::class)
                ->defaultSort('-created_at')
                ->published()
                ->byUser($author->id)
                ->with('author', 'categories')
                ->paginate($request->input('per_page', 12)),
        ]);
    }

    /**
     * Display a posts list by category id.
     *
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function postsByCategory(Request $request, Category $category)
    {
        return view('posts.list', [
            'posts' => $category->posts()
                ->published()
                ->with('author', 'categories')
                ->orderBy('created_at', 'desc')
                ->paginate($request->input('per_page', 12)),
        ]);
    }
}
