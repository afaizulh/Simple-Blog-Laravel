@extends('layouts.app')

@section('title', 'Create Blog')

@section('content')
    <h1 class="my-2">Buat Postingan</h1>
    <form method="POST" action="{{ url('posts') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" rows="3" name="content" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
    <a href="{{ url('posts') }}" class="btn btn-primary mt-3">Kembali</a>
@endsection
