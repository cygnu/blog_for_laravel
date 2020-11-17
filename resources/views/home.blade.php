@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <tr>
                        <th>ID</th>
                        <th><a href>タイトル</a></th>
                        <th></th>
                    </tr>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
