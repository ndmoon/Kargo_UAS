@extends('backend.layouts.main')
@section('title','Daftar Customer')
@section('navCst', 'active')

<!-- <style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
</style> -->

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-10">
                <div class="card-header pb-0">
                    <h4>Customers</h4>
                    <a href="/backend-customers/create" class="btn btn-primary float-end">Add</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Nama Lengkap</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8 ps-2">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">No.Telp</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->nama_lengkap }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->no_telp }}</td>
                                    <td>{{ $customer->alamat }}</td>
                                    <td>
                                        <a href="/backend-customers/{{ $customer->id }}/edit" class="btn btn-warning">Edit</a>
                                        <form action="/backend-customers/{{ $customer->id }}" method="post">
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
    <!-- {{ $customers->links()}} -->
@endsection