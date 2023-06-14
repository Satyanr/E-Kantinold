@extends('layouts.admin')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4">Ruangan</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex mb-3">
                            <div class="me-auto p-2">
                                <i class="fas fa-table me-1"></i>
                                Daftar Ruangan
                            </div>

                            <div class="p-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambahkan Ruangan
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nomor Ruangan</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    
                                    $no = 1;
                                    
                                @endphp
                                @foreach ($ruangans as $ruangan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $ruangan->name }}</td>
                                        <td>{{ $ruangan->nomor }}</td>
                                        <td>{{ $ruangan->users->count() }}</td>
                                        <td>
                                            <div class="dropend">
                                                <i class="fa fa-ellipsis-v" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('ruangan.edit', [$ruangan->id]) }}"><i
                                                            class="fas fa-edit pr-1"></i>Edit</a>
                                                    <a class="dropdown-item text-danger"
                                                        href="{{ route('ruangan.delete', $ruangan->id) }}"
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
                    </div>
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
                <form action="{{ route('ruangan.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nomor">Nomor Ruangan</label>
                            <input id="nomor" type="text" name="nomor" required class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
