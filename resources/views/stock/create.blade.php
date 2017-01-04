@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>
                        Update stock for {{ $product->name }}
                    </strong>
                </div>
                <form class="panel-body" method="POST" action="/product/{{ $product->uri($product->name) }}/stock">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="attribute_name" class="col-md-3 control-label">Attribute Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="attribute_name" placeholder="What is the attribute name?">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="attribute_name" class="col-md-3 control-label">Stock</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="stock" placeholder="How many stock left?">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-8">
                            <button class="btn btn-success" type="submit">
                                Add Stock
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>
                        Manage Stock
                    </strong>
                </div>
                <div class="panel-body">
                <div>Delete attribute will cause error to users that are currently ordering the stock.</div>
                    @foreach($product->attributes as $attribute)
                        <form class="panel-body" method="POST" action="/product/{{ $product->uri($product->name) }}/stock">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $attribute->id }}">
                            <label for="attribute" class="col-md-2 control-label">Attribute</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="attribute_name" value="{{ $attribute->name }}">
                            </div>
                            <label for="attribute" class="col-md-1 control-label">Stock</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="stock" value="{{ $attribute->stock }}">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                        </form>

                        <form class="panel-body" method="POST" action="/product/{{ $product->uri($product->name) }}/stock">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="attributeId" value="{{ $attribute->id }}">
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>


@endsection