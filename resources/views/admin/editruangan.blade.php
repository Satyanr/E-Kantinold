@extends('layouts.admin')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 mb-4">Edit Ruangan</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('ruangan.edit.update', $ruangans->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="text" name="name" value="{{$ruangans->name}}" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nomor">Nomor Ruangan</label>
                            <input id="nomor" type="text" name="nomor" value="{{$ruangans->nomor}}" required class="form-control">
                        </div>
    
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
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

      
@endsection