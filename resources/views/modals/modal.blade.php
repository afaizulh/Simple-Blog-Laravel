
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Hapus
</button>

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