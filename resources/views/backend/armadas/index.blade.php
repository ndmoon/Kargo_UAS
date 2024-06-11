@extends('backend.layouts.main')
@section('title','Daftar Armada')
@section('navArm', 'active')

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
                    <h4>Armadas</h4>
                    <a href="/backend-armadas/create" class="btn btn-primary float-end">Add</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8 ps-2">Max Weight</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Dimension</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($armadas as $arm)
                                <tr>
                                    <td>
                                        @if(isset($arm->pictures) && $arm->pictures->isNotEmpty())
                                            <img class="img-thumbnail" width="150" src="/uploads/{{ $arm->pictures->first()->filename }}" alt="">
                                        @endif
                                        {{ $arm->name }}
                                    </td>
                                    <td>{{ $arm->max_weight }} Kg</td>
                                    <td>L {{ $arm->length }} cm <strong>X</strong> W {{ $arm->width}} cm <strong>X</strong> H {{ $arm->height}} cm</td>
                                    <td>{{ $arm->alamat }}</td>
                                    <td>
                                        <a href="/backend-armadas/{{ $arm->id }}/edit" class="btn btn-warning">Edit</a>
                                        <form action="/backend-armadas/{{ $arm->id }}" method="post">
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
    <!-- {{ $armadas->links()}} -->
@endsection