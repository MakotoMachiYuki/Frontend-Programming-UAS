@extends('layout')
@section('title', 'GatGate')
@section('header')
@include('partials.header')
@endsection
@section('content')
<link rel="stylesheet" href="css/homepage.css">
<div id="main">
    <div id="slideshowContainer" ng-controller="SlideshowController">
        <div class="slides" ng-repeat="slide in slides track by $index" ng-class="{'ng-show': $index === slideIndex}">
            <img ng-src="[[slide.image]]" alt="Slide [[$index + 1]]" />
        </div>
        <div id="slideDots">
            <span class="dot" ng-class="{'active': $index === slideIndex}" ng-repeat="slide in slides track by $index"
                ng-click="currentSlide($index)"></span>
        </div>
    </div>
    <div id="productTab"><span class="tab active"> Best Products</span></div>
    <div id="productsContainerDiv" ng-controller="ProductController">
        <div id="productsContainer" class="products">
            <a ng-repeat="product in products" ng-href="[[product.url]]">
                <div class="product">
                    <img ng-src="[[product.image]]" alt="[[product.name]]">
                    <h3>[[product.name]]</h3>
                    <p>[[product.price]]</p>
                </div>
            </a>
        </div>
    </div>
    @section('footer')
    @include('partials.footer')
    @endsection
</div>

@endsection