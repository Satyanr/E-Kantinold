<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="/ownerasset/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    @stack('style')
</head>

<body class="sb-nav-fixed">
    {{-- top navbar  --}}
    <x-topbarowner />

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            {{-- sidebar  --}}
            <x-sidebarowner />
        </div>

        {{-- content --}}
        @yield('content')

        <!-- Modal Notification -->
        <div class="modal fade" id="Notification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="accordion accordion-flush " id="accordionFlushRiwayat">
                            @foreach ($riwayats as $transaksi)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button id="bgbuttonnotif-{{$transaksi->id}}" class="accordion-button collapsed text-center"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{ $transaksi->id }}" aria-expanded="false"
                                            aria-controls="flush-collapse{{ $transaksi->id }}">
                                            <div class="col">{{ $transaksi->name }}</div>
                                            <div class="col">{{ $transaksi->jumlah }}</div>
                                            <div class="col">{{ $transaksi->created_at }}</div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{ $transaksi->id }}"
                                        class="accordion-collapse collapse overflow-y-auto"
                                        data-bs-parent="#accordionFlushRiwayat">
                                        <div class="accordion-body">
                                            <p class="lead">Total Harga: {{ $transaksi->total_harga }}</p>
                                            <p class="lead">Tambahan Item: {{ $transaksi->itemtambahan }}</p>
                                            <p class="lead">Catatan Pesanan: {{ $transaksi->body }}</p>
                                            <p class="lead">Status: {{ $transaksi->status }}</p>
                                            <div class="container text-center">
                                                <div class="row row-cols-2">
                                                    <div class="col">
                                                        <form
                                                            action="{{ route('transaksi.status.update', $transaksi->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="status"
                                                                value="Pesanan di Terima">
                                                            <button id="checknotif1"
                                                                class="btn btn-primary">Terima</button>
                                                        </form>
                                                    </div>
                                                    <div class="col">
                                                        <form
                                                            action="{{ route('transaksi.status.update', $transaksi->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="status"
                                                                value="Pesanan di Tolak">
                                                            <button id="checknotif2"
                                                                class="btn btn-danger">Tolak</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/ownerasset/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/ownerasset/assets/demo/chart-area-demo.js"></script>
    <script src="/ownerasset/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="/ownerasset/js/datatables-simple-demo.js"></script>



    <script>
        @foreach ($riwayats as $transaksi)
        var inf = '{{$transaksi->status}}';

        // Get the button element with the corresponding transaction ID
        var button = document.getElementById('bgbuttonnotif-{{$transaksi->id}}');

        // Check the value of the status and add appropriate classes for the background color
        if (inf == 'Pesanan di Terima') {
            button.classList.add('text-white');
            button.classList.add('bg-success');
        } else if (inf == 'Pesanan di Tolak') {
            button.classList.add('text-white');
            button.classList.add('bg-danger');
        } else {
            button.classList.add('bg-opacity-50');
            button.classList.add('bg-secondary');
        }
    @endforeach
    </script>

    @stack('script')
</body>

</html>
