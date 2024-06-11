@extends('backend.layouts.main')
@section('title','Add Order')

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card mb-10">
                <div class="card-header pb-0">
                    <h6>Add Order</h6>
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
        <form action="/backend-orders" method="post">
            @csrf
            <div class="form-group">
                <label for="order_number">Order Number</label>
                <input type="text" name="order_number" id="order_number" class="form-control">
            </div>
            <div class="form-group">
                <label for="user_id">Customer</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="number" name="total_amount" id="total_amount" class="form-control">
            </div>
            <div class="form-group">
                <label for="order_status_id">Order Status</label>
                <select name="order_status_id" id="order_status_id" class="form-control">
                    @foreach ($orderStatuses as $orderStatus)
                        <option value="{{ $orderStatus->id }}">{{ $orderStatus->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
