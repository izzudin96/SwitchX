<div class="panel panel-default">
    <div class="panel-heading">
        Slider customization
    </div>
    
    <div class="panel-body">
        <form class="form-horizontal" role="form" action="/dashboard" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label class="col-md-4 control-label" for="slider1">
                    Slider 1 Image Uri
                </label>

                <div class="col-md-6">
                    <input value="{{ $dashboard->slider1 }}" type="text" class="form-control" name="slider1" placeholder="Recommended image size is 1140x500px">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-4 control-label" for="slider2">
                    Slider 2 Image Uri
                </label>

                <div class="col-md-6">
                    <input value="{{ $dashboard->slider2 }}" type="text" class="form-control" name="slider2" placeholder="Recommended image size is 1140x500px">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="slider3">
                    Slider 3 Image Uri
                </label>

                <div class="col-md-6">
                    <input value="{{ $dashboard->slider3 }}" type="text" class="form-control" name="slider3" placeholder="Recommended image size is 1140x500px">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>