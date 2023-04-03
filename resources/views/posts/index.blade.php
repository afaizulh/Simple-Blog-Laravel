@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <h1>Blog Saya</h1><br>
    <a href="{{ url('posts/create') }}" class="btn btn-success">+ Buat Baru</a>
    <a href="{{ url('posts/trash') }}" class="btn btn-danger">Trash Bin</a>
    <p class="text-muted">
        Total Postingan Aktif : <span class="badge bg-success">{{ $totalPostsActive }}</span> /
        Total Postingan Non-Aktif : <span class="badge bg-warning">{{ $totalPostsNonActive }}</span> /
        Total Postingan Dihapus : <span class="badge bg-danger">{{ $totalTrashPosts }}</span>
    </p>

    @foreach ($posts as $p)
        <div class="card my-4">
            <div class="body">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->title }}</h5>
                    <p class="card-text">{{ $p->content }}</p>
                    <p class="card-text"><small class="text-muted">Created at
                            {{ date('d M Y H:i', strtotime($p->created_at)) }}</small></p>
                    <a href="{{ url("posts/{$p->slug}") }}" class="btn btn-primary">Selengkapnya</a>
                    <a href="{{ url("posts/{$p->slug}/edit") }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
