<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Customer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.orders.index', ['orders' => Order::latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_number' => 'required',
            'customer_id' => 'required',
            'total_amount' => 'required|numeric',
            'order_status_id' => 'required'

        ]);
        Order::create($validatedData);
        return redirect('/backend-order')->with('pesan', 'Data Order Berhasil disimpan');
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
        return view('backend.orders.edit', [
            'orders' => Order::find($id),
            'customers' => Customer::all(),
            'orderstatus' => OrderStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'order_number' => 'required',
            'customer_id' => 'required',
            'total_amount' => 'required',
            'order_status_id' => 'required'
        ]);
        Order::where('id', $id)->update($validatedData);
        return redirect('/backend-orders')->with('pesan', 'Data Order Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::destroy($id);
        return redirect('/backend-order')->with('pesan', 'Data Order Berhasil di Hapus');
    }
}
