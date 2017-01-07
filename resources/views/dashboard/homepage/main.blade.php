@extends('layouts.app')

@section('content')

<div class="col-md-10">

    @include('dashboard.homepage.slider')

    @include('dashboard.homepage.feature')

    @include('dashboard.homepage.image')
    
</div>

<div class="col-md-2">
    @include('dashboard/sidebar')
</div>

@endsection