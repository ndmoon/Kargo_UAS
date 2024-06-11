@extends('backend.layouts.main')
@section('title','Edit Order')

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card mb-10">
                <div class="card-header pb-0">
                    <h6>Edit Order</h6>
                </div>
                <div class="card-body px-3 pt-0 pb-2">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/backend-orders/{{ $orders->id }}" method="post">
    @csrf
    @method('PUT')
            <div class="form-group">
                <label for="order_number">Order Number</label>
                <input type="text" name="order_number" id="order_number" class="form-control" 
                value="{{ old ('order_number', $orders->order_number) }}">
            </div>
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="user_id" class="form-control">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" 
                        @if ($customer->id === $orders->customer_id) selected @endif>{{ $customer->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="number" name="total_amount" id="total_amount" class="form-control" 
                value="{{ $orders->total_amount }}">
            </div>
            <div class="form-group">
                <label for="order_status_id">Order Status</label>
                <select name="order_status_id" id="order_status_id" class="form-control">
                    @foreach ($orderstatus as $status)
                        <option value="{{ $status->id }}" 
                        @if ($status->id === $orders->order_status_id) 
                        selected @endif>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
