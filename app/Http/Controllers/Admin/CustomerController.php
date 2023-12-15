<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Pelanggan::all();

        return view('admin.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $golongan = Golongan::all();

        // dd($golongan);
        $aktif = ['Y','N'];
        $user = User::all();

        return view('admin.customer.create', compact('golongan', 'aktif', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'golongan_id' => 'required|integer',
        //     'no' => 'required',
        //     'nama' => 'required',
        //     'hp' => 'required',
        //     'ktp' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        //     'seri' => 'required',
        //     'meteran' => 'required',
        //     'aktif' => 'required',
        //     'user_id' => 'required|integer',
        //     'alamat ' => 'required',
        // ]);

        // dd($validated);

        $extension = $request->file('ktp')->getClientOriginalExtension();
        $namKtp = rand() . '.' . $extension;
        $path = $request->file('ktp')->storeAs('ktp', $namKtp, 'public');

        $validated['nama'] = $request->nama;
        $validated['hp'] = $request->hp;
        $validated['seri'] = $request->seri;
        $validated['aktif'] = $request->aktif;
        $validated['no'] = $request->no;
        $validated['ktp'] = $namKtp;
        $validated['golongan_id'] = $request->golongan_id;
        $validated['user_id'] = Auth::user()->id;
        $validated['meteran'] = $request->meteran;
        $validated['alamat'] = $request->alamat;


        $pelanggan = Pelanggan::create($validated);

        return redirect()->route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $p = Pelanggan::find($id);

        return view('admin.customer.show', compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $p = Pelanggan::find($id);
        $golongan = Golongan::all();
        $aktif = ['Y','N'];
        $user = User::all();

        return view('admin.customer.edit', compact('p', 'golongan', 'aktif', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::find($id);

        if ($request->file('ktp')) {
            $extension = $request->file('ktp')->getClientOriginalExtension();
            $namKtp = rand() . '.' . $extension;
            $path = $request->file('ktp')->storeAs('ktp', $namKtp, 'public');
            // $pelanggan->ktp = $namKtp;
        } else {
            $namKtp = $pelanggan->ktp;
        }


        $pelanggan = Pelanggan::find($id)->update([
            'golongan_id' => $request->golongan_id,
            'no' => $request->no,
            'nama' => $request->nama,
            'hp' => $request->hp,
            'ktp' => $namKtp,
            'seri' => $request->seri,
            'aktif' => $request->aktif,
            'user_id' => Auth::user()->id,
            'meteran' => $request->meteran,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id)->delete();

        return redirect()->route('admin.customers.index');
    }
}
