@extends('backend.layouts.main')
@section('title','Add Armada')

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card mb-10">
                <div class="card-header pb-0">
                    <h6>Add Armada</h6>
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
                    <form method="post" action="/backend-armadas" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="max_weight" class="form-label">Max Weight</label>
                            <input name="max_weight" type="max_weight" class="form-control" id="max_weight" aria-describedby="max_weight" placeholder="Max Weight">
                        </div>
                        <div class="mb-3">
                            <label for="length" class="form-label">Length</label>
                            <input name="length" type="text" class="form-control" id="length" aria-describedby="length">
                        </div>
                        <div class="mb-3">
                            <label for="width" class="form-label">Width</label>
                            <input name="width" type="text" class="form-control" id="width" aria-describedby="width">
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Height</label>
                            <input name="height" type="text" class="form-control" id="height" aria-describedby="height">
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