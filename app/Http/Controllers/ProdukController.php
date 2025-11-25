<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Produk;

class ProdukController extends Controller
{
    function indexStaff() {
        $produk = Produk::orderBy('id_produk', 'desc')->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create_produk');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit_produk', compact('produk'));
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('staff.produk')->with('success', 'Produk berhasil dihapus.');
    }
    
    public function index()
    {
        $produk = [
            ['nama' => 'Produk 1', 'harga' => 7500000, 'gambar' => '1.jpg', 'diskon' => 10],
            ['nama' => 'Produk 2', 'harga' => 4800000, 'gambar' => '2.jpg', 'diskon' => 5],
            ['nama' => 'Produk 3', 'harga' => 5200000, 'gambar' => '3.jpg', 'diskon' => 0],
            ['nama' => 'Produk 4', 'harga' => 150000, 'gambar' => '4.jpg', 'diskon' => 20],
            ['nama' => 'Produk 2', 'harga' => 4800000, 'gambar' => '2.jpg', 'diskon' => 5],
            ['nama' => 'Produk 3', 'harga' => 5200000, 'gambar' => '3.jpg', 'diskon' => 0],
            ['nama' => 'Produk 1', 'harga' => 7500000, 'gambar' => '1.jpg', 'diskon' => 10],
            ['nama' => 'Produk 2', 'harga' => 4800000, 'gambar' => '2.jpg', 'diskon' => 5],
            ['nama' => 'Produk 3', 'harga' => 5200000, 'gambar' => '3.jpg', 'diskon' => 0],
            ['nama' => 'Produk 1', 'harga' => 7500000, 'gambar' => '1.jpg', 'diskon' => 10],
            ['nama' => 'Produk 2', 'harga' => 4800000, 'gambar' => '2.jpg', 'diskon' => 5],
            ['nama' => 'Produk 3', 'harga' => 5200000, 'gambar' => '3.jpg', 'diskon' => 0],
            ['nama' => 'Produk 4', 'harga' => 150000, 'gambar' => '4.jpg', 'diskon' => 20],
            ['nama' => 'Produk 2', 'harga' => 4800000, 'gambar' => '2.jpg', 'diskon' => 5],
            ['nama' => 'Produk 3', 'harga' => 5200000, 'gambar' => '3.jpg', 'diskon' => 0],
            ['nama' => 'Produk 1', 'harga' => 7500000, 'gambar' => '1.jpg', 'diskon' => 10],
            ['nama' => 'Produk 2', 'harga' => 4800000, 'gambar' => '2.jpg', 'diskon' => 5],
            ['nama' => 'Produk 3', 'harga' => 5200000, 'gambar' => '3.jpg', 'diskon' => 0],

        ];

        return view('front.produk', compact('produk'));
    }

    public function detail($nama)
    {
        return 'Ini halaman detail produk bernama '.$nama;
    }

    public function cari_produk(Request $request)
    {
        $nama = $request->input('nama');
        $harga_min = $request->input('min');
        $harga_max = $request->input('max');

        $query = Produk::query();

        if (!empty($nama)) {
            $query->where('nama', 'like', '%' . $nama . '%');
        }

        if (!empty($harga_min)) {
            $query->where('harga', '>=', $harga_min);
        }

        if (!empty($harga_max)) {
            $query->where('harga', '<=', $harga_max);
        }

        $produk = $query->get();

        return view('front.produk', compact('produk', 'nama', 'harga_min', 'harga_max'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|max:100',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:50',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'diskon' => $request->diskon ?? 0,
        ]);
        return redirect()->route('staff.produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|max:100',
            'harga' => 'required|numeric|min:0',
            'diskon' => 'nullable|numeric|min:0|max:50',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'diskon' => $request->diskon ?? 0,
        ]);
        return redirect()->route('staff.produk')->with('success', 'Produk berhasil diperbarui!');
    }
    
}
