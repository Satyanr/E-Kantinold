@extends('layouts.main')

@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/mainasset/images/ecarousel.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/mainasset/images/ecarousel.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/mainasset/images/ecarousel.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-4 mb-4">
        <h3 align="center">Makanan & Minuman</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
            @foreach ($foods as $food)
            <div class="col">
                <div class="card h-100 shadow">
                    <img class="menu card-img-top" src="{{ url('public/Image/' . $food->image) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $food->title }}</h5>
                    <p class="card-text">{{$food->user->name}}</p>
                        <h5>Rp.{{ $food->price }},00</h5>
                        <div class="mb-1 d-flex justify-content-around">
                            <a href="{{ route('transaksi', $food->id) }}"
                                class="btn btn-md btn-warning">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4 d-flex justify-content-end">
            <a href="{{route('menu')}}" class="btn btn-warning">Lihat Lebih Banyak</a>
        </div>
    </div>

    <div class="container mt-4 mb-4">
        <h3 align="center">Daftar Kantin</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
            @foreach ($kantins as $kantin)
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="{{ url('public/picture/' . $kantin->image) }}" class="kantin card-img-top rounded-circle" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kantin->name }}</h5>
                        <p class="card-text">Nomor HP: {{ $kantin->nomorhp }}</p>
                        <div class="mb-1 d-flex justify-content-around">
                            <a href="{{ url('home/kantin-detail', $kantin->id) }}"
                                class="btn btn-md btn-warning">Lihat Kantin</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4 d-flex justify-content-end">
            <a href="{{route('kantin')}}" class="btn btn-warning">Lihat Lebih Banyak</a>
        </div>
    </div>

@endsection
