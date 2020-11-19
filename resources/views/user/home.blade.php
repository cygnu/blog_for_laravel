@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('err_msg'))
                <p class="text-danger">
                    {{ session('err_msg') }}
                </p>
            @endif
            <div class="">
                <div class="">Dashboard</div>

                <div class="col-md-12">
                    <table>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <tr>
                            <th>ID</th>
                            <th class="col-md-6">タイトル</th>
                            <th class="col-md-3"></th>
                            <th class="col-md-3"></th>
                        </tr>
                        @forelse ($posts as $post)
                            <tr>
                                <td><span>{{ $post->id }}</span></td>
                                <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td><button class="btn btn-primary" onclick="location.href='/user/posts/edit/{{ $post->id }}'">編集</button></td>
                                <form method="POST" action="{{ route('user.post.delete', $post->id) }}" onSubmit="return checkDelete()">
                                {{ csrf_field() }}
                                <td><button type="submit" class="btn btn-danger" onclick=>消去</button></td>
                            </tr>
                        @empty
                            <div>まだ記事がありません</div>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }</script>
@endsection
