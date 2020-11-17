@extends('layouts.default')

@section('tabTitle', $post->title.' | Blog')

@section('link')
    <li class="header_nav_item"><a href="{{ url('/') }}">記事一覧</a></li>
    <li class="header_nav_item"><a href="/career/">プロフィール</a></li>
    <li class="header_nav_item"><a href="/news/">ニュース</a></li>
    <li class="header_nav_item close_text"><a href>CLOSE</a></li>
@endsection

@section('content')
    <div class="each_article">
        <h1 class="each_article_title">{{ $post->title }}</h1>
    </div>
    <div class="each_article_datetime">
        <p>作成日:{{ $post->created_at->format('Y/m/d H:m') }}</p>
        <p>更新日:{{ $post->updated_at->format('Y/m/d H:m') }}</p>
    </div>
    <div class="each_article_content">
        <p>{!! $post->mark_body !!}</p>
    </div>
@endsection