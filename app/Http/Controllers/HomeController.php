<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = \App\Barang::where('pinjam',1)->get();
        return view('home')->with('barangs', $barangs);
    }

    public function indexcat($filter)
    {
        $barangs = \App\Barang::where('type', $filter)->where('pinjam',1)->get();
        return view('home')->with('barangs', $barangs);
    }

    public function search(Request $req)
    {
        $search = $req->q;
        $products = \App\Barang::where('name', 'like', '%'.$search.'%')->where('pinjam',1)->get();
        return view('home')->with('barangs', $products);
    }
}
