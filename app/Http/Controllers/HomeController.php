<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        $produk = [
            ['nama' => 'Produk 1', 'harga' => 7500000, 'gambar' => '1.jpg'],
            ['nama' => 'Produk 2', 'harga' => 4800000, 'gambar' => '2.jpg'],
            ['nama' => 'Produk 3', 'harga' => 5200000, 'gambar' => '3.jpg'],
            ['nama' => 'Produk 4', 'harga' => 150000, 'gambar' => '4.jpg'],
        ];

        return view('front.home', compact('produk'));
    }

    public function about($nama)
    {
        return 'Saya adalah '.$nama;
    }

    public function home()
    {
        $produk = Produk::take(4)->get();

        return view('front.home', compact('produk'));
    }
}
