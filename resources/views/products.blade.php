@extends('layouts.app')
@section('content')
<h1>{{ $title }}</h1>
    <div class="row">
        @foreach($products as $product)
            <!-- component can be used for repeating sections such as this one -->
            <!-- <div class="card m-2 p-2">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text">Price: {{ $product['price'] }}</p>
                    <a href="#" class="btn btn-primary float-right">Buy this shit.</a>
                </div>
            </div> -->

            <!-- add colon before the variable only when the data is dynamic, otherwise, remove it -->
            <x-card :name="$product['name']" :price="$product['price']"></x-card>
        @endforeach
    </div>

@endsection