@extends('layouts.owner')


@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4 mx-auto">Daftar Makanan dan Minuman</h1>
                <div class="row">

                </div>
                <div class="row">

                </div>
                <div class="card mb-4">
                    <form action="{{-- route('post.food.status') --}}" method="post">
                        @csrf
                        <div class="card-header">
                            <div class="d-flex mb-3">
                                <div class="me-auto p-2">
                                    <i class="fas fa-table me-1"></i>
                                    Daftar Makanan
                                </div>
                                <div class="p-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Tambahkan Makanan
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        
                                        $no = 1;
                                        
                                    @endphp
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <div class="col col-lg-2">
                                                    <img class="img-responsive mw-100 h-100"
                                                        src="{{ url('public/Image/' . $post->image) }}">
                                                </div>
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->price }}</td>
                                            <td>{{ $post->body }}</td>
                                            <td>
                                                <form action="{{route('post.food.status', $post->id)}}" method="post">
                                                    @csrf
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="status{{ $post->id }}" value="1"
                                                            id="status_{{ $post->id }}_1"
                                                            {{ $post->status == '1' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="status_{{ $post->id }}_1">
                                                            Tersedia
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="status{{ $post->id }}" value="0"
                                                            id="status_{{ $post->id }}_0"
                                                            {{ $post->status == '0' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="status_{{ $post->id }}_0">
                                                            Tidak Tersedia
                                                        </label>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="dropend">
                                                    <i class="fa fa-ellipsis-v" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false"></i>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('food.tambahitem', $post->id)}}"><i
                                                            class="fas fa-edit pr-1"></i>Tambahan Item</a>
                                                        <a class="dropdown-item" href="{{route('post.food.edit', $post->id)}}"><i
                                                                class="fas fa-edit pr-1"></i>Edit</a>
                                                        <a class="dropdown-item text-danger" href="{{route('post.delete', $post->id)}})}}"
                                                            onclick="return confirm('Apakah anda yakin ? Data akan dihapus!!!')"><i
                                                                class="fas fa-trash pr-1">
                                                            </i>Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- Collapse Item --}}

                            {{-- <div class="dropdown d-flex flex-column">
                            <a class="btn btn-secondary dropdown-toggle bg-opacity-50" data-bs-toggle="collapse"
                                href="#collapseExample" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                Link with href
                            </a>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                Some placeholder content for the collapse component. This panel is hidden by default but
                                revealed when the user activates the relevant trigger.
                            </div>
                        </div> --}}

                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
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
            </div>
        </div>
    </div>
@endsection
