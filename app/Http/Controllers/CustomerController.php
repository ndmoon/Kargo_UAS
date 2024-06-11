<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() {
        $customers=Customer::latest()->paginate(10);
        return view('backend.customers.index',['customers'=>$customers]);
    }

    public function create() {
        return view('backend.customers.create');
    }

    public function store(Request $request) {
        
        $request->validate([
            'nama_lengkap'=>'required',
            'email'=>'required|email',
            'no_telp'=>'required',
            'alamat'=>'required'
        ]);
        Customer::create([
            'nama_lengkap'=>$request->nama_lengkap,
            'email'=>$request->email,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat,
        ]);
        return redirect('/backend-customers')->with('success','Data Customer berhasil ditambahkan.');
    }

    public function edit($id) {
        
        return view('backend.customers.edit', [
            'customers'=>Customer::find($id)
        ]);
    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'alamat' => 'required'
        ]);
        Customer::where('id', $id)->update($validatedData);
        return redirect('/backend-customers')->with('success', 'Data Customer Berhasil diupdate.');

        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email',
        //     'no_telp'=>'required',
        //     'alamat'=>'required'
        // ]);
        // $customer=>Customer::find($id);
        // $customer->update([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'no_telp'=>$request->no_telp,
        //     'alamat'=>$request->alamat,
        // ]);
        // return redirect('/customers')->with('success','Data Customer berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('/backend/customers')->with('success', 'Data Customer Berhasil dihapus.');
    }
}
