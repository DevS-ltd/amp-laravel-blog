<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
            ->with('author')
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
}
