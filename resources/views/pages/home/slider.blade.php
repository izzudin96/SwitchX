<div id="myCarousel" class="container carousel slide" data-ride="carousel">

<div class="carousel-inner" role="listbox">

    <div class="item active">
        <img class="first-slide" src="{{ $dashboard->slider1 }}" alt="First slide">
    </div>

    <div class="item">
        <img class="second-slide" src="{{ $dashboard->slider2 }}" alt="Second slide">
    </div>

    <div class="item">
        <img class="third-slide" src="{{ $dashboard->slider3 }}" alt="Third slide">
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