<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Manage Stock
        </strong>
    </div>

    <div class="panel-body">
        <div class="alert alert-warning text-center">
            Deleting any attribute will destroy all currently unsubmitted orders.
        </div>

        @foreach($product->attributes as $attribute)
            <form class="form-horizontal" method="POST" action="/product/{{ $product->uri($product->name) }}/stock">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                    <input type="hidden" name="id" value="{{ $attribute->id }}">
                    
                    <div class="form-group">
                        <label for="attribute" class="col-md-3 control-label">
                            Attribute
                        </label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="attribute_name" value="{{ $attribute->name }}">
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label for="stock" class="col-md-3 control-label">
                            Stock
                        </label>

                        <div class="col-md-8">
                            <input type="text" class="form-control" name="stock" value="{{ $attribute->stock }}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                    

            </form>

            <form class="form-horizontal" method="POST" action="/product/{{ $product->uri($product->name) }}/stock">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <input type="hidden" name="attributeId" value="{{ $attribute->id }}">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </div>
                    </div>
            </form><hr>

        @endforeach

    </div>
</div>