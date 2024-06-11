@extends('backend.layouts.main')
@section('title','Edit Armada')

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card mb-10">
                <div class="card-header pb-0">
                    <h6>Edit Armadas</h6>
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
                    <form method="post" action="/backend-armadas/{{ $armadas->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name' ,$armadas->name)}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="max_weight" class="form-label">Max Weight</label>
                            <input type="max_weight" class="form-control @error('max_weight') is-invalid @enderror" name="max_weight" value="{{ 
                            old('max_weight' ,$armadas->max_weight)}}">
                            @error('max_weight')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="length" class="form-label">Length</label>
                            <input type="text" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ 
                            old('length' ,$armadas->length)}}">
                            @error('length')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="width" class="form-label">Width</label>
                            <input type="text" class="form-control @error('width') is-invalid @enderror" name="width" value="{{ 
                            old('width' ,$armadas->width)}}">
                            @error('width')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Height</label>
                            <input type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ 
                            old('height' ,$armadas->height)}}">
                            @error('height')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Pictures</label>
                            <input name="files[]" type="file" class="form-control" multiple id="picture" aria-describedby="picture">
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection