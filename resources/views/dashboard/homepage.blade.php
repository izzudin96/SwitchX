@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Homepage Customization
        </div>
        
        <div class="panel-body">

            <form class="form-horizontal" role="form" action="/order/form" method="POST">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">
                        Feature 1
                    </label>

                    <div class="col-md-6">
                        <input value="" type="text" class="form-control" name="name" placeholder="Heading 1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="address">
                        Description
                    </label>

                    <div class="col-md-6">
                        <textarea name="address" class="form-control" rows="6" placeholder="What are you selling, what really is your business?"></textarea>
                    </div>
                </div><hr>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">
                        Feature 2
                    </label>

                    <div class="col-md-6">
                        <input value="" type="text" class="form-control" name="name" placeholder="Heading 2">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="address">
                        Description
                    </label>

                    <div class="col-md-6">
                        <textarea name="address" class="form-control" rows="6" placeholder="What are you selling, what really is your business?"></textarea>
                    </div>
                </div><hr>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">
                        Feature 3
                    </label>

                    <div class="col-md-6">
                        <input value="" type="text" class="form-control" name="name" placeholder="Heading 3">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="address">
                        Description
                    </label>

                    <div class="col-md-6">
                        <textarea name="address" class="form-control" rows="6" placeholder="What are you selling, what really is your business?"></textarea>
                    </div>
                </div><hr>
                
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