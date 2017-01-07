<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Add new attributes and stocks
        </strong>
    </div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="/product/{{ $product->uri($product->name) }}/stock">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="attribute_name" class="col-md-3 control-label">
                    Attribute Name
                </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="attribute_name" placeholder="Combo Package A">
                </div>
            </div>

            <div class="form-group">
                <label for="attribute_name" class="col-md-3 control-label">
                    Stock
                </label>
                <div class="col-md-8">
                    <input type="number" class="form-control" name="stock" placeholder="How many stock left?">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button class="btn btn-success" type="submit">
                        Add Stock
                    </button>
                </div>
            </div>
        </form>
    </div>
    
</div>