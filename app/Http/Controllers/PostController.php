<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
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
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }
}
