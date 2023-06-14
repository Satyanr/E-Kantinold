@extends ('layouts.main')

@section('content')
    <section class="container text-center">
        <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="row">
                <div class="col">
                    <a href="{{ url()->previous() }}" class="link-body-emphasis display-4 mt-3"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="{{ url('public/Picture/' . Auth::user()->image) }}" width="200" height="200"
                        class="rounded-circle">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h1 class="display-4 mt-3">{{ Auth::user()->name }}</h1>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <p class="lead">Nomor Hp: {{ Auth::user()->nomorhp }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <h4 class="">Riwayat Transaksi</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="accordion accordion-flush " id="accordionFlushRiwayat">
                        @foreach($riwayats as $transaksi)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-secondary bg-opacity-50 text-center" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{$transaksi->id}}" aria-expanded="false"
                                    aria-controls="flush-collapse{{$transaksi->id}}">
                                    <div class="col">{{$transaksi->name}}</div>
                                    <div class="col">{{$transaksi->jumlah}}</div>
                                    <div class="col">{{$transaksi->created_at}}</div>
                                </button>
                            </h2>
                            <div id="flush-collapse{{$transaksi->id}}" class="accordion-collapse collapse overflow-y-auto"
                                data-bs-parent="#accordionFlushRiwayat">
                                <div class="accordion-body">
                                <p class="lead">Total Harga: {{$transaksi->total_harga}}</p>
                                <p class="lead">Catatan Pesanan: {{$transaksi->body}}</p>
                                <p class="lead">Status: {{$transaksi->status}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



    </section>
@endsection
