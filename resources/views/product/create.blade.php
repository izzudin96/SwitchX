@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">

    <div class="panel panel-default">
        <div class="panel-heading">
            Create a New Product
        </div>

        <div class="panel-body">
            <form class="form-horizontal" role='form' method="POST" action="/product">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">
                        Name
                    </label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" placeholder="Iron Steel">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-3 control-label">
                        Description
                    </label>

                    <div class="col-md-8">
                        <textarea placeholder="Crafting is easier than ever using the high-quality steel" name="description" class="form-control" rows="5"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-md-3 control-label">
                        Price
                    </label>

                    <div class="col-md-8">
                        <input type="number" id="price" type="text" class="form-control" name="price" placeholder="49">
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-md-3 control-label">
                        Post Unit
                    </label>

                    <div class="col-md-8">
                        <input id="postUnit" type="text" class="form-control" name="postUnit" placeholder="eg: 1,2,5,7,10">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-success">
                            Create product
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>




@endsection