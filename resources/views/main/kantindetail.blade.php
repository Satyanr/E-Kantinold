@extends('layouts.main')

@section('content')
<section class="jumbotron text-center mb-4">
    <img src="{{url('public/picture/'. $kantin->image)}}" class="kantin rounded-circle">
    <h1 class="mt-2">{{$kantin->name}}</h1>
    <p class="mt-2">{{$kantin->body}}</p>
    <button type="button" class="btn btn-warning">Hubungi</button>
  </section>

  <hr>

  <div class="album">
    <div class="container mt-4 mb-4">
      <h2 align="center">Makanan & Minuman</h2>
      <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
        @foreach($foods as $food)
        <div class="col">
          <div class="card h-100 shadow">
            <img src="{{url('public/image/'. $food->image)}}" class="menu card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$food->name}}</h5>
              <h5>Rp.{{ $food->price }},00</h5>
              <div class="mb-1 d-flex justify-content-around">
                <a href="{{route('transaksi', $food->id)}}" class="btn btn-warning">Beli Sekarang</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endsection
