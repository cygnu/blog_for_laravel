@extends('layouts.default')

@section('tabTitle', 'Blog')

@section('link')
    <li class="header_nav_item"><a href="/career/">プロフィール</a></li>
    <li class="header_nav_item"><a href="/news/">ニュース</a></li>
    <li class="header_nav_item close_text"><a href>CLOSE</a></li>
@endsection

@section('content')
    <article class="articles">
        <ul class="main_articles">
            @forelse ($posts as $post)
            <li class="main_article">
                <h1 class="main_article_title">
                    <a href="/posts/{{ $post->id }}">
                        <span>{{ $post->title }}</span>
                    </a>
                </h1>
                <div>
                    <span>{{ $post->updated_at->format('Y/m/d H:m') }}</span>
                    <span>&nbsp;{{ $post->name }}</span>
                </div>
                <!-- <p class="main_article_content"><span>{{ $post->body }}</span></p> -->
            </li>
            @empty
                <h1 class="main_article_title">まだ記事がありません</h1>
            @endforelse
        </ul>
        <div class="bootstrap">
            <div class="main_articles_pagination">
                {{ $posts->appends(request()->query())->links('vendor/pagination/pagination-view') }}
            </div>
        </div>
    </article>
@endsection