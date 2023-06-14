@extends('layouts.owner')

@section('content')

<form action="{{ route('post.food.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row g-3">
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input class="form-control form-control-sm" name="image" type="file" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" id="inputEmail4" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Kategori</label>
                <select name="category" class="form-select" required>
                    <option selected>Pilih</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">Harga</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input name="price" type="text" class="form-control" required>
                    <span class="input-group-text">.00</span>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" rows="5" class="form-control" required></textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </div>
</form>
@endsection