<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderStatus;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.order_statuses.index', ['orderstatus' => OrderStatus::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.order_statuses.create', ['orderstatus' => OrderStatus::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required'

        ]);
        OrderStatus::create($validatedData);
        return redirect('/backend-orderStatus')->with('pesan', 'Data Status Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.order_statuses.edit', [
            'orderstatus' => OrderStatus::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3'
        ]);
        OrderStatus::where('id', $id)->update($validatedData);
        return redirect('/backend-orderStatus')->with('pesan', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OrderStatus::destroy($id);
        return redirect('/backend-orderStatus')->with('pesan', 'Data Berhasil di Hapus');
    }
}
