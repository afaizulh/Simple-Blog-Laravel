<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $posts = Post::status(true)->get();
        $postsActive = $posts->count();
        $posts_nonActive = Post::status(false)->count();
        $trashPosts = Post::onlyTrashed()->count();

        $data = [
            'posts' => $posts,
            'totalPostsActive' => $postsActive,
            'totalPostsNonActive' => $posts_nonActive,
            'totalTrashPosts' => $trashPosts
        ];
        return view('posts.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        Post::create(
            [
                'title' => $title,
                'content' => $content
            ]
        );
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $selected_post = Post::selectBySlug($slug)->first();
        $comments = $selected_post->comments()->limit(10)->get();
        $total_comments = $comments->count();

        $data = [
            'posts' => $selected_post,
            'comments' => $comments,
            'total_comments' => $total_comments
        ];

        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $selected_post = Post::selectBySlug($slug)->first();

        $data = [
            'post' => $selected_post
        ];

        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        Post::selectBySlug($slug)->update([
            'title' => $title,
            'content' => $content,
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        return redirect("posts/$slug");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        Post::selectBySlug($slug)->delete();

        return redirect('posts');
    }

    public function trash()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $trash_posts = Post::onlyTrashed()->get();

        $data = [
            'posts' => $trash_posts,
        ];

        return view('posts.recyclebin', $data);
    }

    public function restore($slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        Post::selectBySlug($slug)->status(true)->restore();

        return redirect('posts');
    }

    public function restores()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        Post::onlyTrashed()->status(true)->restore();

        return redirect('posts');
    }

    public function delpermanent($slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        Post::selectBySlug($slug)->forceDelete();

        return redirect('posts/trash');
    }

    public function delpermanents()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        Post::onlyTrashed()->forceDelete();

        return redirect('posts/trash');
    }
}
