<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * 記事投稿画面
     */
    public function create() {
        return view('user.posts.create');
    }

    /**
     * 記事登録処理
     */
    public function store(PostRequest $request) {
        // 記事データを受け取る
        $inputs = $request->all();
        \DB::beginTransaction();
        try {
            // 記事を投稿する
            Post::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        \Session::flash('err_msg', '記事を投稿しました');
        return redirect(route('user.home.index'));
    }

    /**
     * 各記事編集画面
     */
    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('user.posts.edit', ['post' => $post]);
    }

    /**
     * 記事編集処理
     */
    public function update(PostRequest $request) {
        // 記事データを受け取る
        $inputs = $request->all();
        \DB::beginTransaction();
        try {
            // 記事を更新する
            $post = Post::find($inputs['id']);
            $post->fill([
                'title' => $inputs['title'],
                'body' => $inputs['body'],
            ]);
            $post->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '記事を更新しました');
        return redirect(route('user.home.index'));
    }

    /**
     * 記事削除処理
     */
    public function delete($id) {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('user.home.index'));
        }

        try {
            // 記事を削除する
            Post::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }
        
        \Session::flash('err_msg', '削除しました');
        return redirect(route('user.home.index'));
    }
}
