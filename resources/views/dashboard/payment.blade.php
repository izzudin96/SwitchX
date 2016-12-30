@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Payment Settings
        </div>
        
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="/order/form" method="POST">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">
                        Bank Name
                    </label>

                    <div class="col-md-6">
                        <input value="" type="text" class="form-control" name="name" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">
                        Bank Account Number
                    </label>

                    <div class="col-md-6">
                        <input value="" type="text" class="form-control" name="name" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">
                        Holder's Name
                    </label>

                    <div class="col-md-6">
                        <input value="" type="text" class="form-control" name="name" placeholder="">
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