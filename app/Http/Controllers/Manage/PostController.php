<?php

namespace App\Http\Controllers\Manage;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\GetPostsListRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'show']);
    }

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
            ->defaultSort('-id')
            ->allowedSorts(['id', 'title'])
            ->byUser(auth()->id())
            ->paginate($request->input('per_page', 10));
        $posts->appends($request->validated())->links();

        return view('manage.posts.list', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = Post::create(array_merge(
            $request->validated(),
            [
                'user_id' => auth()->id(),
            ]
        ));

        $post->categories()->attach($request->get('categories'));

        foreach ($request->file('images') as $file) {
            $post->addMedia($file)->toMediaCollection(Post::PREVIEW);
        }

        return redirect()->route('manage.posts.index');
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

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified post in storage.
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
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
