@extends('backend.layouts.main')
@section('title','Edit Customer')

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card mb-10">
                <div class="card-header pb-0">
                    <h6>Edit Customers</h6>
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
                    <form method="post" action="/backend-customers/{{ $customers->id }}">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                            name="nama_lengkap" value="{{ old('nama_lengkap' ,$customers->nama_lengkap)}}">
                            <!-- <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="nama" aria-describedby="nama" 
                            placeholder="Nama Lengkap" value="{{ old('name' ,$customers->name) }}"> -->
                            @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ 
                            old('email' ,$customers->email)}}">
                            <!-- <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" 
                            placeholder="Email" value="{{ old('email' ,$customers->email) }}> -->
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telephone</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ 
                            old('no_telp' ,$customers->no_telp)}}">
                            <!-- <input name="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" aria-describedby="no_telp" 
                            placeholder="No Telephone" value="{{ old('no_telp' ,$customers->no_telp) }}> -->
                            @error('no_telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ 
                            old('alamat' ,$customers->alamat)}}">
                            <!-- <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" aria-describedby="alamat" 
                            placeholder="Alamat" value="{{ old('alamat' ,$customers->alamat) }}> -->
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection