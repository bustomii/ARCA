<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Invoice;

class AdminController extends Controller
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
        $barang = Barang::get();
        $active = 'Barang';
        // passing data ke variabel $paket
        return view('admin.barang', ['barang' => $barang, 'active' => $active]);
    }

    public function users()
    {
        $users = User::get();
        $active = 'Users';
        return view('admin.users', ['users' => $users, 'active' => $active]);
    }

    public function invoice()
    {
        $invoice = Invoice::get();
        // $users = User::find();

        $active = 'Invoice';
        return view('admin.invoice', ['invoice' => $invoice, 'active' => $active]);
    }
}
