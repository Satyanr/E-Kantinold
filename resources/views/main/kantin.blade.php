@extends('layouts.main')

@section('content')
    <div class="album">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($kantins as $kantin)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{url('public/picture/'.$kantin->image)}}">
                        <div class="card-body">
                            <h4>{{$kantin->name}}</h4>
                            <span>Nomor Telphone: {{$kantin->nomorhp}}</span>
                            <span>Tentang: {{$kantin->body}}</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{url('home/kantin-detail', $kantin->id)}}" class="btn btn-md btn-warning">Lihat Kantin</a>
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
