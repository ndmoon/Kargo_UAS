@extends('backend.layouts.main')
@section('title','Add Customer')

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card mb-10">
                <div class="card-header pb-0">
                    <h6>Add Customers</h6>
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
                    <form method="post" action="/backend-customers">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telephone</label>
                            <input name="no_telp" type="text" class="form-control" id="no_telp" aria-describedby="no_telp" placeholder="No Telephone">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input name="alamat" type="text" class="form-control" id="alamat" aria-describedby="alamat" placeholder="Alamat">
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection