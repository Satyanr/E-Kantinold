@extends('layouts.owner')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Item Tambahan Untuk Menu: {{$post->title}}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tambahkan Item</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="me-auto p-2">
                            <i class="fas fa-table me-1"></i>
                            Tambahan Item
                        </div>
                        <div class="p-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambahkan Item
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
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                
                                $no = 1;
                                
                            @endphp
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>Rp.{{ $item->harga }},00</td>
                                    <td>
                                        <div class="dropend">
                                            <i class="fa fa-ellipsis-v" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false"></i>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item text-danger" href="{{route('item.delete', $item->id)}}')}}"
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
            <form action="{{ route('food.tambahitem.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" id="inputEmail4" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harga</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input name="harga" type="text" class="form-control" required>
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <input type="hidden" name="food_id" value="{{$post->id}}">
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