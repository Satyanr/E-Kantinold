@extends('layouts.main')

@section('content')
    <form action="{{ route('transaksi.store', $foods->id) }}" method="post">
        @csrf
        <div class="container">
            <div class="bg row d-flex justify-content-center pb-5">
                <div class="col-sm-4 col-md-4 ml-1">
                    <div class="p-2 d-flex flex-column mt-4" style="border-radius:14px">
                        <div class="text-center"> <img class="menu img-fluid"
                                src="{{ url('public/Image/' . $foods->image) }}" /></div>
                        <h2 class="mt-2">{{ $foods->title }}</h2>
                        <h4>Rp.{{ $foods->price }},00</h4>
                    </div>
                    <input name="kantin_id" readonly style="display: none" value="{{ $foods->author_id }}">
                    <input name="name" readonly style="display: none" value="{{ $foods->title }}">
                </div>
                <div class="col-sm-5 col-md-6 mobile">
                    <div class="p-3 d-flex flex-column">
                        <div class="pt-2">
                            <h2>Atur Pesanan</h2>
                        </div>
                        <hr>
                        <div class="d-flex">
                            <div class="col-8">
                                <div>
                                    <label>Jumlah: </label>
                                </div>
                                <div class="input-group">
                                    <button class="btn btn-warning" type="button" id="decrease-btn">-</button>
                                    <input type="text" name="jumlah" class="form-control text-center" id="number-input"
                                        value="1">
                                    <button class="btn btn-warning" type="button" id="increase-btn">+</button>
                                </div>
                                @foreach ($items as $item)
                                    <div class="form-check mt-3">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->harga }}"
                                                id="checkout{{ $item->id }}">
                                            {{ $item->name }} Harga:
                                            {{ $item->harga }}</label>
                                        <input type="hidden" name="item_names[]" value="{{ $item->name }}"
                                            id="item{{ $item->id }}">
                                    </div>
                                @endforeach
                                <div>
                                    <textarea name="description" class="mt-3 mb-2" placeholder="Pesan" style="width: 350px; height: 125px;" required></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="pt-1">
                            <div class="px-4 mx-8 pt-2"></div>
                            <h5>Total bayar:</h5>
                            <h3 id="totalharga">Rp.{{ $foods->price }},00</h3>
                            <input id="ttlhrg" name="totalharga" readonly style="display: none"
                                value="{{ $foods->price }}">
                        </div>
                        <input type="submit" value="Konfirmasi Pesanan" class="btn btn-success btn-block">
                        <a class="btn mt-3 btn-danger btn-block" href="{{ route('home') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script>
        var harga = document.getElementById('totalharga');
        var ttlharga = document.getElementById('ttlhrg');

        $(document).ready(function() {
            var decreaseBtn = $('#decrease-btn');
            var increaseBtn = $('#increase-btn');
            var numberInput = $('#number-input');
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    calculateTotal();
                    if (checkbox.checked) {
                        document.getElementById('item' + checkbox.id).value = checkbox.value;
                    } else {
                        document.getElementById('item' + checkbox.id).value = '';
                    }
                });
            });

            function calculateTotal() {
                var total = 0;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        total += parseInt(checkbox.value);
                    }
                });
                var quantity = parseInt(numberInput.val());
                var subtotal = quantity * {{ $foods->price }};
                var grandTotal = subtotal + total;

                harga.innerHTML = 'Rp.' + grandTotal + ',00';
                ttlharga.value = grandTotal;
            }

            decreaseBtn.on('click', function() {
                var value = parseInt(numberInput.val());
                if (value > 1) {
                    numberInput.val(value - 1);
                    calculateTotal();
                }
            });

            increaseBtn.on('click', function() {
                var value = parseInt(numberInput.val());
                numberInput.val(value + 1);
                calculateTotal();
            });
        });
    </script>
@endpush
