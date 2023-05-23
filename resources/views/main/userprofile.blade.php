@extends ('layouts.main')

@section('content')
<section class="jumbotron text-center">
    <img src="{{ url('public/Picture/' . $user->image) }}" width="200" height="200" class="rounded-circle">
    <h1 class="display-4 mt-3">{{ $user->name }}</h1>
    <p class="lead">{{ $user->email }}</p>
    <button type="button" class="btn btn-warning">Riwayat Transaksi</button>
    <button type="button" class="btn btn-warning">Logout</button>
</section>
@endsection