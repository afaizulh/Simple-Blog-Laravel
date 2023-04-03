@extends('layouts.app')

@section('title', "Blog | $post->title")

@section('content')
    <h1 class="my-2">Ubah Postingan</h1>
    <form method="POST" action="{{ url("posts/$post->slug") }}">
        @method('PATCH')
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" rows="3" name="content" value="{{ $post->content }}" required>{{ $post->content }}</textarea>
        </div>

        <a href="{{ url('posts') }}" class="btn btn-primary">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Hapus
        </button>
    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Postingan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin ingin menghapus postingan "<span class="text-danger fw-bold">{{ $post->title }}</span>" ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tidak</button>
                    <form method="POST" action="{{ url("posts/$post->slug/delete") }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
