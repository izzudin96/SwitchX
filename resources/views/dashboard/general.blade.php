@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            General Settings
        </div>
        
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="/dashboard" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">
                        Your business name
                    </label>

                    <div class="col-md-6">
                        <input value="{{ $dashboard->name }}" type="text" class="form-control" name="name" placeholder="Registered business name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="storeName">
                        Store name
                    </label>

                    <div class="col-md-6">
                        <input value="{{ $dashboard->storeName }}" type="text" class="form-control" name="storeName" placeholder="Displayed store name in the header">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="registrationNumber">
                        SSM Registration Number
                    </label>

                    <div class="col-md-6">
                        <input value="{{ $dashboard->registrationNumber }}" type="text" class="form-control" name="registrationNumber" placeholder="Business registration number">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="description">
                        Company Description
                    </label>

                    <div class="col-md-6">
                        <textarea name="description" class="form-control" rows="6" placeholder="What are you selling, what really is your business?">{{ $dashboard->description }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

<div class="col-md-2">
    @include('dashboard/sidebar')
</div>

@endsection