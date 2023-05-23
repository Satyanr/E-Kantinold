@extends('layouts.main')

@section('content')
    <form action="{{ route('transaksi.store', $foods->id) }}" method="post">
        @csrf
        <section class="jumbotron text-center mb-5">
            <img src="{{ url('public/Image/' . $foods->image) }}" width="200" height="200" class="rounded-circle">
            <h1 class="display-4 mt-3">{{ $foods->title }}</h1>
            <h4 class="lead" id="harga">Rp.{{ $foods->price }},00</h4><br>
        </section>

        <input name="kantin_id" readonly style="display: none" value="{{ $foods->author_id }}">
        <input name="name" readonly style="display: none" value="{{ $foods->title }}">


        <div class="container text-center">
            <div class="row justify-content-md-center">
                <label class="col-sm-2 col-form-label">Total Harga</label>
                <div class="col-sm-10">
                    <input name="totalharga" readonly class="form-control-plaintext" id="totalharga"
                        value="Rp.{{ $foods->price }},00">
                </div>
            </div>
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" data-numspin step="1" min="1"
                max="100" value="1" />
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-warning px-5">Beli</button>
        </div>
    </form>
@endsection

@push('script')
    <script>
        var harga = document.getElementById('totalharga');
        var jumlah = document.querySelector('input[data-numspin]');

        jumlah.addEventListener('change', function() {
            harga.value = 'Rp.' + (this.value * {{ $foods->price }}) + ',00';
        });
    </script>
@endpush
