<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice;

class UserController extends Controller
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
        $invoice = Invoice::where('iduser', auth()->user()->id)->get();
        // $users = User::find();
        $active = 'Invoice';
        return view('user.invoice', ['invoice' => $invoice, 'active' => $active]);
    }
}
