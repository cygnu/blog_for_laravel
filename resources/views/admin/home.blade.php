@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @if (session('err_msg'))
                        <p class="text-danger">
                            {{ session('err_msg') }}
                        </p>
                    @elseif (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <tr>
                        <th>ID</th>
                        <th><a href>タイトル</a></th>
                        <th></th>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
