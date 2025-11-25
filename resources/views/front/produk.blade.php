@extends('layouts.main')

@section('title', 'Produk')

@section('content')
    <h2 class="mb-3">Produk Kami</h2>

    {{-- Form Pencarian --}}
    <form action="" method="GET" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-md-4">
                <input type="text" name="nama" class="form-control" placeholder="Cari produk...">
            </div>
            <div class="col-md-2">
                <input type="number" name="min" class="form-control" placeholder="Harga min">
            </div>
            <div class="col-md-2">
                <input type="number" name="max" class="form-control" placeholder="Harga max">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-info w-100">Cari</button>
            </div>
            <div class="col-md-2">
                <a href="{{ url('/produk') }}" class="btn btn-outline-secondary w-100">Reset</a>
            </div>
        </div>
    </form>

    {{-- Hasil Pencarian --}}
    <h3 class="mb-3">Hasil Pencarian</h3>
    <div class="featured-products">
        <div class="row">
            @foreach ($produk as $item)
            <div class="col-md-2 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('img/' . $item['gambar']) }}" class="card-img-top" alt="{{ $item['nama'] }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $item['nama'] }}</h5>

                        @if ($item['harga'] > 5000000)
                            <span class="badge bg-success text-light mb-2">Premium</span>
                        @elseif ($item['harga'] >= 2000000)
                            <span class="badge bg-warning text-light mb-2">Menengah</span>
                        @else
                            <span class="badge bg-danger text-light mb-2">Ekonomis</span>
                        @endif

                        <p class="card-text text-primary font-weight-bold">
                            Rp {{ number_format($item['harga'], 0, ',', '.') }}
                        </p>

                        @if($item['diskon'] > 0)
                            <span class="badge bg-success text-light mb-2">
                                Harga Diskon: <br/>
                                Rp {{ number_format($item['harga'] - ($item['harga'] * $item['diskon'] / 100), 0, ',', '.') }} <br/>
                                 ({{ $item['diskon'] }}% Off)
                            </span>
                        @endif


                        <a href="#" class="btn btn-info mt-auto">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection
