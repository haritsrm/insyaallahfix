<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller as BaseController;

use App\Http\Controllers\CartService;

use Alert;
use Illuminate\Support\Facades\Session;

use App\Cart;

use Illuminate\Http\Request;

class CartController extends BaseController
{
    public function index()
    {
        $carts = Cart::where('id_user', Auth::user()->id)->get();
        return view('cart.index')->with('carts', $carts);
    }

    public function create(Request $req)
    {
        $products = Cart::select('id_barang')->where('id_user', Auth::user()->id)->get();
        $condition = true;

        foreach($products as $product)
        {
            if($req->product == $product->id_barang)
            {
                $condition = false;
            }
        }

        if( $condition == true )
        {
            Cart::create([
                'id_barang' => $req->product,
                'id_user' => Auth::user()->id,
                'quantity' => $req->quantity,
            ]);
    
            Session::flash('success', 'Menambahkan ke keranjang!');
            return redirect()->back()->with('success', 'Menambahkan ke keranjang!');
        }
        elseif( $condition == false )
        {
            alert()->warning('Barang sudah ada di keranjang!', 'Warning');
            $condition = true;
            return redirect()->back();
        }
    }

    public function buyNow(Request $req)
    {
        $products = Cart::select('id_barang')->where('id_user', Auth::user()->id)->get();
        $condition = true;

        foreach($products as $product)
        {
            if($req->product == $product->id_barang)
            {
                $condition = false;
            }
        }

        if( $condition == true )
        {
            Cart::create([
                'id_barang' => $req->product,
                'id_user' => Auth::user()->id,
                'quantity' => $req->quantity,
            ]);
    
            alert()->success('Menambahkan ke keranjang!', 'Berhasil');
            return redirect('carts');
        }
        elseif( $condition == false )
        {
            alert()->warning('Barang sudah ada di keranjang!', 'Warning');
            $condition = true;
            return redirect()->back();
        }
    }

    public function update(Request $req)
    {
        $jum = $req->jum;

        foreach($jum as $key => $q)
        {
            $cart = Cart::find($key);
            $cart->update([
                'quantity' => $q,
            ]);
        }

        return redirect('/verifikasi');
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        Alert::success('Menghapus barang dari keranjang!', 'Berhasil');
        return redirect('carts');
    }
}
