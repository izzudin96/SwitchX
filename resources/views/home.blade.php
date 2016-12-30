@extends('layouts.app')

@section('content')
    <div id="myCarousel" class="container carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <a href="/shirts/"><img class="first-slide" src="/uploads/images/default/Slider-1.png" alt="First slide"></a>
        </div>
        <div class="item">
          <a href="/shirts/"><img class="second-slide" src="/uploads/images/default/Slider-2.png" alt="Second slide"></a>
        </div>
        <div class="item">
          <a href="/shirts/"><img class="third-slide" src="/uploads/images/default/Slider-3.png" alt="Third slide"></a>
        </div>
        <div class="item">
          <a href="/shirts/"><img class="fourth-slide" src="/uploads/images/default/Slider-4.png" alt="Third slide"></a>
        </div>
        <div class="item">
          <a href="/shirts/"><img class="fifth-slide" src="/uploads/images/default/Slider-5.png" alt="Third slide"></a>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <i class="glyphicon fa fa-angle-double-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <i class="glyphicon fa fa-angle-double-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="container marketing">
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="uploads/images/default/logo-1-garment.png" alt="Generic placeholder image" width="230" height="230">
          <h2>Premium Shirt Quality</h2>
          <p>We only use High-Quality Garment in the shirt production. High-durable 100% cotton that will last for years to come.</p>
          <p><a class="btn btn-default" href="/faqs" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="uploads/images/default/logo-2-poslaju.png" alt="Generic placeholder image" width="230" height="230">
          <h2>7-days Shipping</h2>
          <p>All shipping is free throughout Malaysia. Deliveries to your doorstep in just 7-days maximum, courtesy of Poslaju Malaysia.</p>
          <p><a class="btn btn-default" href="/faqs" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="uploads/images/default/logo-3-easy-system.png" alt="Generic placeholder image" width="230" height="230">
          <h2>Blazing Fast Web</h2>
          <p>Order multiple products at the touch of your fingertips, with our easy-to-use and lightning super-fast order system thanks to Laravel.</p>
          <p><a class="btn btn-default" href="/shopping-guide" role="button">View Shopping Guide &raquo;</a></p>
        </div>
      </div>
    </div>
@endsection
