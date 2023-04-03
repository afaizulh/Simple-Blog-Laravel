@extends('layouts.app')

@section('title', 'Blog | TrashBin')

@section('content')
    <h1>Recycle Bin</h1><br>
    <a href="{{ url('posts') }}" class="btn btn-success">Kembali</a>
    <form method="POST" action="{{ url('posts/all/restores') }}">
        @csrf
        <button type="submit" class="btn btn-warning mt-3">Restore All</button>
    </form>
    <form method="POST" action="{{ url('posts/all/permanents') }}">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Delete All</button>
    </form>
    @foreach ($posts as $p)
        <div class="card my-4">
            <div class="body">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->title }}</h5>
                    <p class="card-text">{{ $p->content }}</p>
                    <p class="card-text"><small class="text-muted">Created at
                            {{ date('d M Y H:i', strtotime($p->created_at)) }}</small></p>
                    <form method="POST" action="{{ url("posts/$p->slug/permanent") }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger mt-3">Delete Permanent</button>
                    </form>
                    <form method="POST" action="{{ url("posts/$p->slug/restore") }}">
                        @csrf
                        <button type="submit" class="btn btn-warning mt-3">Restore</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
