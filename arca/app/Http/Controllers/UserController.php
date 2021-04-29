<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Invoice_meta;
use App\Models\Barang;

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
        $invoice = Invoice::where('iduser', auth()->user()->id)->orderBy('id', 'DESC')->get();
        $barang = Barang::orderBy('name', 'ASC')->get();

        $active = 'Invoice';
        return view('user.invoice', ['invoice' => $invoice, 'barang' => $barang, 'active' => $active]);
    }

    public function userinvoice(Request $request)
    {
        if ($request->submit == 1) {
            $invoice = Invoice::create([
                'iduser' => auth()->user()->id,
                'status' => 0,
            ]);
            $lastID = $invoice->id;

            for ($i = 0; $i < count($request->barang); $i++) {
                $meta = Invoice_meta::insert([
                    'idinvoice' => $lastID,
                    'idbarang'  => $request->barang[$i],
                    'kuantiti'  => $request->kuantiti[$i]
                ]);
            }
            return redirect()->route('user.invoice')->with('success', 'Berhasil, Menambahkan Invoice !!!');
        } else {
            return redirect()->route('user.invoice')->with('success', 'Berhasil, Edit Invoice !!!');
        }
    }
    public function delete($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect()->route('user.invoice')->with('success', 'Berhasil, Hapus Invoice !!!');
    }
}
