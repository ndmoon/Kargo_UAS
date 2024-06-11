@extends('backend.layouts.main')
@section('tittle','Status')
@section('navStatus', 'active')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-10">
            <div class="card-header pb-0">
                <h4>Order Status</h4>
                <a href="/backend-orders/create" class="btn btn-primary float-end">Add</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Status Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8 ps-2">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orderstatus as $status)
                            <tr>
                                <td>{{ $orderstatus->firstItem()+$loop->index}}</td>
                                <td>{{ $status->name}}</td>
                                <td>
                                <a href="/backend-orderStatus/{{ $orderstatus->firstItem()+$loop->index }}/edit" class="btn btn-warning btn-sm">
                                     <span data-feather="edit"></span> Edit</a>

                                <form action="/backend-orderStatus/{{ $orderstatus->firstItem()+$loop->index }}" method="post" class="d-inline">
                                    @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ?')">
                                        <span data-feather="trash-2"></span> Delete</button>
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
{{ $orderstatus->links()}}
@endsection