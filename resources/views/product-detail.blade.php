@extends('layout')

@section('title', 'Product Details')

@section('content')
<div class="container my-5" ng-controller="ProductDetailController">
    <div ng-if="!error">
<h1 class="text-center"> [{product.productName }]</h1>
        <div class="row">
            <div class="col-md-6">
        <img ng-src="{{asset('/images/produk/[{product.images.colors.default[0]}]')}}" class="img-fluid" alt=" [{product.productName }]">
            </div>
            <div class="col-md-6">
        <p><strong>Category:</strong>  [{product.category }]</p>
        <p><strong>Price Range:</strong> IDR  [{product.lowestPrice | number }] - IDR  [{product.highestPrice | number }]</p>
                <button class="btn btn-primary">Buy Now</button>
            </div>
        </div>
    </div>
    <div ng-if="error">
<p class="text-center text-danger"> [{error }]</p>
    </div>
</div>
@endsection
