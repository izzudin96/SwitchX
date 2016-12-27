
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($shirts as $shirt)
                <div class="col-md-6 hcenter">
                    
                    @if($shirt->images()->where('is_default' , 1)->first())
                        <img class="img-responsive" src="{{ Storage::url($shirt->images()->where('is_default', 1)->first()->path) }}" alt="">
                    @elseif($shirt->images()->first())
                        <img class="img-responsive" src="{{ Storage::url($shirt->images()->first()->path) }}" alt="">
                    @endif


                    <a href="/shirt/{{ $shirt->uri($shirt->name) }}">
                        <h3 class="shirt-name">{{ $shirt->name }}</h3>
                    </a>

                    <h4>RM {{ $shirt->price }}</h4>

                    <h4>Stock {{ $shirt->stock($shirt) }}</h4>

                    <a class="btn btn-success" href="/shirt/{{ $shirt->uri($shirt->name) }}">Buy Now</a>
                    
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection