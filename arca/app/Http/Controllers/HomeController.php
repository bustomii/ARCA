<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice_meta;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/');
    }

    public function detail($id)
    {
        $meta = Invoice_meta::join('barang', 'invoice_meta.idbarang', '=', 'barang.id')
            ->where('idinvoice', $id)->get();

        return response(['data' => $meta], 200);
    }
}
