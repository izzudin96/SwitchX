<div class="panel-body">
    <form class="form-horizontal" method="POST" action="/shipping">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">
                Box Name
            </label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="name" placeholder="Poslaju Prepaid S">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="unit">
                Unit Covered
            </label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="unit" placeholder="How many units can a box contain?">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="unit">
                Box Price (RM)
            </label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="price" placeholder="6?">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form><hr>
</div>