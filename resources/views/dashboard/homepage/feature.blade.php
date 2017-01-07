<div class="panel panel-default">
    <div class="panel-heading">
        Features Customization
    </div>
    
    <div class="panel-body">

        <form class="form-horizontal" role="form" action="/dashboard" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label class="col-md-4 control-label" for="feature1">
                    Feature 1
                </label>

                <div class="col-md-6">
                    <input value="{{ $dashboard->feature1 }}" type="text" class="form-control" name="feature1" placeholder="Recommended image size is 230x230px">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="feature1Description">
                    Description
                </label>

                <div class="col-md-6">
                    <textarea name="feature1Description" class="form-control" rows="6" placeholder="Our service is really fast, that you might think.">{{ $dashboard->feature1Description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="feature1Image">
                    Image Uri
                </label>

                <div class="col-md-6">
                    <input value="{{ $dashboard->feature1Image }}" type="text" class="form-control" name="feature1Image" placeholder="Recommended image size is 230x230px">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label class="col-md-4 control-label" for="feature2">
                    Feature 2
                </label>

                <div class="col-md-6">
                    <input value="{{ $dashboard->feature2 }}" type="text" class="form-control" name="feature2" placeholder="High quality product">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="feature2Description">
                    Description
                </label>

                <div class="col-md-6">
                    <textarea name="feature2Description" class="form-control" rows="6" placeholder="Our product is guaranteed to be in high quality because...">{{ $dashboard->feature2Description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="feature2Image">
                    Image Uri
                </label>

                <div class="col-md-6">
                    <input value="{{ $dashboard->feature2Image }}" type="text" class="form-control" name="feature2Image" placeholder="Recommended image size is 230x230px">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label class="col-md-4 control-label" for="feature3">
                    Feature 3
                </label>

                <div class="col-md-6">
                    <input value="{{ $dashboard->feature3 }}" type="text" class="form-control" name="feature3" placeholder="Return policy">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="feature3Description">
                    Description
                </label>

                <div class="col-md-6">
                    <textarea name="feature3Description" class="form-control" rows="6" placeholder="Money back if you didn't satifsy...">{{ $dashboard->feature3Description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="feature3Image">
                    Image Uri
                </label>

                <div class="col-md-6">
                    <input value="{{ $dashboard->feature3Image }}" type="text" class="form-control" name="feature3Image" placeholder="Recommended image size is 230x230px">
                </div>
            </div>

            <hr>
            
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