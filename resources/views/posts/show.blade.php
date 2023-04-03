@extends('layouts.app')

@section('title', "Blog | $posts->title")

@section('content')
    <article class="blog-post mt-5">
        <h2 class="blog-post-title mb-1">{{ $posts->title }}</h2>
        <p class="blog-post-meta">{{ date('d M Y H:i', strtotime($posts->created_at)) }} <a href="#">1joule</a>
        </p>

        <p>{{ $posts->content }}</p>

    </article>

    <a href="{{ url('posts') }}" class="btn btn-primary">Kembali</a>

    <p class="text-muted">All Comments: {{ $total_comments }}</p>
    <div class="card mb-3">
        @foreach ($comments as $c)
            <div class="card-body">
                <p style="font-size:8pt">{{ $c->comment }}</p>
            </div>
        @endforeach
    @endsection
