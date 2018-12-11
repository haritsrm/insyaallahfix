<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function detail($id)
    {
        $product = \App\Barang::find($id);
        return view('product.detail')->with('product', $product);
    }
}
