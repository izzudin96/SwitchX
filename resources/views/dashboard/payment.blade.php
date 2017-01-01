@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Payment Settings
        </div>
        
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="/dashboard" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label class="col-md-4 control-label" for="bankName">
                        Bank Name
                    </label>

                    <div class="col-md-6">
                        <input value="{{ $dashboard->bankName }}" type="text" class="form-control" name="bankName" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="bankAccountNo">
                        Bank Account Number
                    </label>

                    <div class="col-md-6">
                        <input value="{{ $dashboard->bankAccountNo }}" type="text" class="form-control" name="bankAccountNo" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="bankHolderName">
                        Holder's Name
                    </label>

                    <div class="col-md-6">
                        <input value="{{ $dashboard->bankHolderName }}" type="text" class="form-control" name="bankHolderName" placeholder="">
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