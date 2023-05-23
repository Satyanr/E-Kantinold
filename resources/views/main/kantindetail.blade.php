@extends('layouts.main')

@section('content')
    <section class="jumbotron text-center mb-4">
        <img src="{{url('public/picture/'. $kantin->image)}}" width="200" height="200" class="rounded-circle">
        <h1 class="display-4">{{$kantin->name}}</h1>
        <p class="lead">{{$kantin->body}}</p>
        <button type="button" class="btn btn-warning">Hubungi</button>
    </section>

    <div class="album">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($foods as $food)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{url('public/image/'. $food->image)}}">
                        <div class="card-body">
                            <h4>{{$food->name}}</h4>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Rp.{{ $food->price }},00</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('transaksi', $food->id)}}" class="btn btn-md btn-warning">Beli Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
