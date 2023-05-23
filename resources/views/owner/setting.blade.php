@extends('layouts.owner')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Pengaturan Kantin</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Atur Kantin Mu !!!</li>
                </ol>
                <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <section class="jumbotron text-center mb-4">
                                <form action="{{ route('owner.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label for="imgInp"><img id="pictureprof"
                                            src="{{ url('public/Picture/' . Auth::user()->image) }}" width="200"
                                            height="200" class="rounded-circle mb-3"></label>
                                    <input name="image" style="display: none" type='file'
                                        id="imgInp" required/>

                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ Auth::user()->name }}" placeholder="Nama Kantin">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="form-label">Email</label>
                                            <input name="email" value="{{ Auth::user()->email }}" type="email"
                                                class="form-control" placeholder="Email">
                                        </div>
                                        <div class="col">
                                            <label class="form-label">Nomor Hp</label>
                                            <input name="nomorhp" value="{{ Auth::user()->nomorhp }}" type="text"
                                                class="form-control" placeholder="Nomor Hp">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea name="description" rows="5" class="form-control" placeholder="Deskripsi Kamu: {{ Auth::user()->body }}" required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </section>
                        </div>
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

@push('script')
    <script>
        var blah = document.getElementById('pictureprof')
        var imgInp = document.getElementById('imgInp')
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
