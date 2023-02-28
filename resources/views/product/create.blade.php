@extends('layouts.app')
@section('content')

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
            <input type="text" class="form-control" id="prodNameId" name="prod_name" placeholder="Enter product name">
            @error('prod_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantityId">Quantity</label>
            <input type="text" class="form-control" id="quantityId" name="prod_quantity" placeholder="Enter quantity">
            @error('prod_quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="priceId">Price</label>
            <input type="text" class="form-control" id="priceId" name="prod_price" placeholder="Enter price">
            @error('prod_price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    
@endsection