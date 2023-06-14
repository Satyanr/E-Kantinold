@extends('layouts.main')

@section('content')

<div class="container mt-4 mb-4">
    <h2 align="center">Makanan & Minuman</h2>
    <form class="d-flex mt-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Cari Menu" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
    </form>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
        @foreach ($foods as $food)
        <div class="col">
            <div class="card h-100 shadow">
                <img src="{{ url('public/Image/' . $food->image) }}" class="menu card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$food->title}}</h5>
                    <p class="card-text">{{$food->user->name}}</p>
                    <h5>Rp.{{$food->price}},00</h5>
                    <div class="mb-1 d-flex justify-content-around">
                        <a href="{{ route('transaksi', $food->id) }}"
                            class="btn btn-md btn-warning">Beli Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
