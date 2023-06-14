@extends('layouts.main')

@section('content')

<div class="container mt-4 mb-4">
    <h2 align="center">Daftar Kantin</h2>
    <form class="d-flex mt-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Cari Kantin" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
    </form>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
        @foreach($kantins as $kantin)
        <div class="col">
            <div class="card h-100 shadow">
                <img src="{{url('public/picture/'.$kantin->image)}}" class="kantin card-img-top rounded-circle" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$kantin->name}}</h5>
                    <h6 class="card-text">Nomor Telphone: {{$kantin->nomorhp}}</h6>
                    <p class="card-text">Tentang: {{$kantin->body}}</p>
                    <div class="mb-1 d-flex justify-content-around">
                        <a href="{{url('home/kantin-detail', $kantin->id)}}" class="btn btn-warning">Lihat Kantin</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
