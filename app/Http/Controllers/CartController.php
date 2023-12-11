<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // public function cart()
    // {
    //     if(Auth::user()) {
    //         $pesanan = Transaksi::where('user_id', Auth::user()->id)->where('status',0)->first();
            
    //         if($this->pesanan) {
    //             $this->pesanan_details = PesananDetail::where('pesanan_id', $this->pesanan->id)->get();
    //         }
    //     }
        
    //     return view('livewire.keranjang', [
    //         'title' => 'Keranjang',
    //         'products' => Product::take(4)->get(),
    //         'pesanan' => $this->pesanan,
    //         'pesanan_details' => $this->pesanan_details
    //     ])->extends('layouts.app')->section('content');
    // }

    // public function index()
    // {
    //     // Mendapatkan data keranjang belanja dari sesi atau basis data
    //     $cart = session()->get('cart', []);

    //     // Menampilkan halaman dengan daftar produk di keranjang
    //     return view('cart.index', ['cart' => $cart]);
    // }

    // public function addToCart(Product $product)
    // {
    //     // Mendapatkan data keranjang belanja dari sesi
    //     $cart = session()->get('cart', []);

    //     // Menambahkan atau memperbarui produk di keranjang
    //     if (isset($cart[$product->id])) {
    //         $cart[$product->id]['quantity']++;
    //     } else {
    //         $cart[$product->id] = [
    //             'id' => $product->id,
    //             'name' => $product->name,
    //             'price' => $product->price,
    //             'quantity' => 1,
    //         ];
    //     }

    //     // Menyimpan data keranjang belanja kembali ke sesi
    //     session()->put('cart', $cart);

    //     return redirect()->route('cart.index')->with('success', 'Product added to cart successfully');
    // }

    // public function updateCart(Request $request)
    // {
    //     // Mendapatkan data keranjang belanja dari sesi
    //     $cart = session()->get('cart', []);

    //     // Memperbarui kuantitas produk di keranjang
    //     foreach ($request->input('quantity') as $productId => $quantity) {
    //         if (isset($cart[$productId])) {
    //             $cart[$productId]['quantity'] = $quantity;
    //         }
    //     }

    //     // Menyimpan data keranjang belanja kembali ke sesi
    //     session()->put('cart', $cart);

    //     return redirect()->route('cart.index')->with('success', 'Cart updated successfully');
    // }

    // public function removeFromCart(Product $product)
    // {
    //     // Mendapatkan data keranjang belanja dari sesi
    //     $cart = session()->get('cart', []);

    //     // Menghapus produk dari keranjang
    //     unset($cart[$product->id]);

    //     // Menyimpan data keranjang belanja kembali ke sesi
    //     session()->put('cart', $cart);

    //     return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully');
    // }

    // public function clearCart()
    // {
    //     // Mengosongkan seluruh keranjang belanja
    //     session()->forget('cart');

    //     return redirect()->route('cart.index')->with('success', 'Cart cleared successfully');
    // }
}
