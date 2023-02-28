@extends('layouts.app')
@section('content')

<div class="row my-4">
    <div class="col-md-4 offset-md-8 text-right">
        <a href="{{ route('product.list') }}">
            <button class="btn btn-primary">Back to list</button>
        </a>
    </div>
</div>

<div class="col-md-12 mt-5">
    <!-- //use session to get success message -->
    @if(session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    
    <!-- declare route inside action -->
    <form action="{{ route('product.name') }}" method="post">
        <!-- when you submit without the required token, it displays error 419 -->
        @csrf
        <div class="form-group">
            <label for="prodNameId">Product Name</label>
            <input type="text" class="form-control" id="prodNameId" name="name" placeholder="Enter product name">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantityId">Quantity</label>
            <input type="text" class="form-control" id="quantityId" name="quantity" placeholder="Enter quantity">
            @error('quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="priceId">Price</label>
            <input type="text" class="form-control" id="priceId" name="price" placeholder="Enter price">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    
@endsection