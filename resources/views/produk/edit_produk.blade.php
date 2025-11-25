<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Form Edit Produk
        </h2>
    </x-slot>
    
    {{-- Container utama yang diset ke BG-INFO --}}
    <div class="py-12 bg-info" style="--bs-bg-opacity: .15; background-color: #cff4fc;"> {{-- Menggunakan BG-INFO (Biru Muda) dengan opacity rendah --}}
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6"> 
            
            {{-- Form Card --}}
            <div class="p-6 sm:p-8 bg-white shadow-lg rounded-lg border border-info"> {{-- Form dengan border biru lembut (Info) --}}
                
                {{-- Judul Form --}}
                {{-- Mengganti Dashboard Staff menjadi Form Edit Produk --}}
                <h3 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3 text-dark" style="border-color: #0dcaf0 !important;">Edit Data Produk</h3>
                
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form action="{{ route('staff.produk.update', $produk->id_produk) }}" method="POST">
                    @csrf @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label text-secondary">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" 
                               value="{{ old('nama', $produk->nama) }}" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label text-secondary">Harga</label>
                        <input type="number" name="harga" class="form-control"
                               value="{{ old('harga', $produk->harga) }}" required>
                    </div>
                    
                    <div class="mb-6">
                        <label class="form-label text-secondary">Diskon (%)</label>
                        <input type="number" name="diskon" class="form-control"
                               value="{{ old('diskon', $produk->diskon) }}">
                    </div>
                    
                    <div class="d-flex justify-content-end space-x-3 mt-8">
                        {{-- Tombol Kembali - Warna Abu-abu netral --}}
                        <a href="{{ route('staff.produk') }}" class="btn btn-secondary me-2">
                            Kembali
                        </a>
                        {{-- Tombol Perbarui - Menggunakan warna INFO (Biru) --}}
                        <button type="submit" class="btn btn-info text-white">
                            Perbarui
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>