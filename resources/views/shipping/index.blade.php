@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Shipping
            </div>
            
            <div class="panel-body">
                @include('shipping.create')

                @include('shipping.lists')
            </div>
        </div>
    </div>
    
@endsection