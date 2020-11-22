@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="col-md-12">
                @if (session('err_msg'))
                    <div class="text-danger">
                        {{ session('err_msg') }}
                    </div>
                @elseif (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-sm table-hover">
                    <tr>
                        <th>ID</th>
                        <th>タイトル</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td><span>{{ $post->id }}</span></td>
                            <td><a href="/posts/{{ $post->id }}"><span>{{ $post->title }}</span></a></td>
                            <td><button class="btn btn-primary" type="button" onclick="location.href='/user/posts/edit/{{ $post->id }}'">編集</button></td>
                            <td>
                                <form method="POST" action="{{ route('user.post.delete', $post->id) }}" onSubmit="return checkDelete()">
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick=>消去</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
