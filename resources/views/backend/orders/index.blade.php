@extends('backend.layouts.main')
@section('tittle','Orders')
@section('navOrder', 'active')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-10">
            <div class="card-header pb-0">
                <h4>Order Management</h4>
                <a href="/backend-orders/create" class="btn btn-primary float-end">Add</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Order Number</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8 ps-2">Customer</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Total Amount</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Order Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->customer->nama_lengkap}}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ $order->orderStatus->name }}</td>
                                    <td>
                                        <a href="/backend-orders/{{ $order->id }}/edit" class="btn btn-warning">Edit</a>
                                        <form action="/backend-orders/{{ $order->id }}" method="post">
                                            @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Yakin hapus data ?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
