<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Deliver to
        </strong>
    </div>

    <div class="panel-body">
        <form class="form-horizontal" role="form" action="/order/form" method="POST">
            {{ csrf_field() }}

            <div class="order-form form-group">
                <label class="col-md-4 control-label" for="name">
                    Name
                </label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" placeholder="Receiver name">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="address">
                    Address
                </label>

                <div class="col-md-6">
                    <textarea name="address" class="form-control" rows="6" placeholder="Where do you want the product to be shipped?"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="poscode">
                    Poscode
                </label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="poscode" placeholder="40000">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="city">
                    City
                </label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="city" placeholder="Shah Alam">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="state">State</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="state" placeholder="Selangor">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="phone">
                    Phone Number
                </label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone" placeholder="+60123456789">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submit Order
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>