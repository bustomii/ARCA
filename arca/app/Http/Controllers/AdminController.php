<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Invoice;
use App\Models\Invoice_meta;
use PhpParser\Node\Expr\FuncCall;

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
        $barang = Barang::orderBy('id', 'DESC')->get();
        $active = 'Barang';
        // passing data ke variabel $paket
        return view('admin.barang', ['barang' => $barang, 'active' => $active]);
    }

    public function loadbarang(Request $request)
    {
        if ($request->submit == 1) {
            Barang::create([
                'name' => $request->nama_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'discount' => $request->discount,
            ]);
            return redirect()->route('admin.barang')->with('success', 'Berhasil, Menambahkan barang !!!');
        } else {
            $barang = Barang::find($request->id);
            $barang->name = $request->nama_barang;
            $barang->harga = $request->harga;
            $barang->stok = $request->stok;
            $barang->discount = $request->discount;
            $barang->save();
            return redirect()->route('admin.barang')->with('success', 'Berhasil, Edit barang !!!');
        }
    }

    public function users()
    {
        $users = User::orderBy('id', 'DESC')->get();
        $active = 'Users';
        return view('admin.users', ['users' => $users, 'active' => $active]);
    }

    public function loaduser(Request $request)
    {
        if ($request->submit == 1) {
            User::create([
                'name'      => $request->nama,
                'email'     => $request->email,
                'password'  =>  bcrypt($request->password),
            ]);
            return redirect()->route('admin.users')->with('success', 'Berhasil, Menambahkan User !!!');
        } else {
            $user = User::find($request->id);
            $user->name      = $request->nama;
            $user->email     = $request->email;
            $user->password  =  bcrypt($request->password);
            $user->save();
            return redirect()->route('admin.users')->with('success', 'Berhasil, Edit User !!!');
        }
    }

    public function invoice()
    {
        $invoice = Invoice::orderBy('id', 'DESC')->get();
        $barang = Barang::orderBy('name', 'ASC')->get();

        $active = 'Invoice';
        return view('admin.invoice', ['invoice' => $invoice, 'barang' => $barang, 'active' => $active]);
    }

    public function loadinvoice(Request $request)
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
            return redirect()->route('admin.invoice')->with('success', 'Berhasil, Menambahkan Invoice !!!');
        } else {
            return redirect()->route('admin.invoice')->with('success', 'Berhasil, Edit Invoice !!!');
        }
    }

    public function delete($active, $id)
    {
        if ($active == 'Barang') {
            $barang = Barang::find($id);
            $barang->delete();
            return redirect()->route('admin.barang')->with('success', 'Berhasil, Hapus Barang !!!');
        } else if ($active == 'Users') {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('admin.users')->with('success', 'Berhasil, Hapus User !!!');
        } else {
            $invoice = Invoice::find($id);
            $invoice->delete();
            return redirect()->route('admin.invoice')->with('success', 'Berhasil, Hapus Invoice !!!');
        }
    }
}
