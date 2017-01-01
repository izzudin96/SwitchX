@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Analytics Settings
        </div>
        
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="/dashboard" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label class="col-md-4 control-label" for="googleAnalyticCode">
                        Google Analytic's Code
                    </label>

                    <div class="col-md-6">
                        <textarea name="googleAnalyticCode" class="form-control" rows="6" placeholder="Paste your Google Analytic code here">{{ $dashboard->googleAnalyticCode }}</textarea>
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