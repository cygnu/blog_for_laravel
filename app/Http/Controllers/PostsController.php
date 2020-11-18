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

    public function postsHome() {
        $posts = Post::latest()->get();
        return view('home',['posts' => $posts]);
    }

    /**
     * 各記事画面
     */
    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    // /**
    //  * 記事投稿画面
    //  */
    // public function create() {
    //     return view('posts.create');
    // }

    // /**
    //  * 記事登録処理
    //  */
    // public function store(PostRequest $request) {
    //     // 記事データを受け取る
    //     $inputs = $request->all();
    //     \DB::beginTransaction();
    //     try {
    //         // 記事を投稿する
    //         Post::create($inputs);
    //         \DB::commit();
    //     } catch(\Throwable $e) {
    //         \DB::rollback();
    //         abort(500);
    //     }
        
    //     \Sesstion::flash('err_msg', '記事を投稿しました');
    //     return redirect(route('home'));
    // }

    // /**
    //  * 各記事編集画面
    //  */
    // public function edit($id) {
    //     $post = Post::findOrFail($id);
    //     return view('posts.edit', ['post' => $post]);
    // }

    // /**
    //  * 記事編集処理
    //  */
    // public function update(PostRequest $request) {
    //     // 記事データを受け取る
    //     $inputs = $request->all();
    //     \DB::beginTransaction();
    //     try {
    //         // 記事を更新する
    //         $post = Post::find($inputs['id']);
    //         $post->fill([
    //             'title' => $inputs['title'],
    //             'body' => $inputs['body'],
    //         ]);
    //         $post->save();
    //         \DB::commit();
    //     } catch(\Throwable $e) {
    //         \DB::rollback();
    //         abort(500);
    //     }

    //     \Sesstion::flash('err_msg', '記事を更新しました');
    //     return redirect(route('home'));
    // }

    // /**
    //  * 記事削除処理
    //  */
    // public function delete($id) {
    //     if (empty($id)) {
    //         \Session::flash('err_msg', 'データがありません');
    //         return redirect(route('home'));
    //     }

    //     try {
    //         // 記事を削除する
    //         Post::destroy($id);
    //     } catch(\Throwable $e) {
    //         abort(500);
    //     }
        
    //     \Session::flash('err_msg', '削除しました');
    //     return redirect(route('home'));
    // }
}
