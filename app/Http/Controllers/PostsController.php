<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostsController extends Controller
{   
    /**
     * トップページ
     */
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('posts.index',['posts' => $posts]);
    }

    /**
     * 各記事画面
     */
    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }
}
