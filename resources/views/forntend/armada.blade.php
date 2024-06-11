@extends('layouts.main')
@section('title', 'Data Armada')
@section('navArm', 'active')

@section('content')
    <h2>Daftar Armada</h2>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table table-responsive">
    <table class="table table-bordered">
    <thead class="table-primary">
      <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Name</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Max Weight</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Dimension</th>
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
  </tr>
@endforeach
</tbody>
    </table>
    {{ $armadas->links() }}

@endsection