@extends('layouts.app')
@section('content')

<div class="row my-4">
    <div class="col-md-4 offset-md-8 text-right">
        <a href="{{ route('product.create') }}">
            <button class="btn btn-primary">Add Product</button>
        </a>
    </div>
</div>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <td>{{ $product->name }}</td>
      <td>{{ $product->quantity }}</td>
      <td>{{ $product->price }}</td>
      <td>
            <a href="{{ route('product.edit', ['id' => $product->id]) }}">
                <button class="btn btn-primary">Edit</button>
            </a>

            <form action="{{ route('product.delete', ['id' => $product->id] ) }}" method="POST">
                @csrf 
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $('.table').DataTable()
    })
</script>
@endpush

