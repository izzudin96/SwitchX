<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Upload Images
        </strong>
    </div>
    
    <div class="panel-body">
        <div class="alert alert-info col-md-12">
            <p class="text-center"><strong>Tip: </strong>Copy the image link below the image into the image uri field above.</p>
        </div>
        <form class="form-horizontal col-md-offset-4 col-sm-offset-3" method="POST" action="/dashboard/{{ $dashboard->id }}/image" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label class="btn btn-default">
                    Browse <input type="file"  name="image"></input>
                </label>

                <button class="btn btn-success" type="submit">
                    Upload Image
                </button>
            </div>
        </form>

    @foreach($dashboard->images as $image)
        <div class="col-md-6">
            <img class="img-responsive" src="{{ Storage::url($image->path) }}" alt="">
            <div class="image-action">
                <div class="col-md-12">
                    <form action="/dashboard/{{ $dashboard->id }}/image" method="POST">
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <input type="hidden" name="image" value="{{ $image->id }}">

                        <button class="btn btn-danger" type="submit">
                            Delete Image
                        </button>
                    </form>
                </div>
            </div>
            <code>
                {{ Storage::url($image->path) }}
            </code>
        </div>
    @endforeach
    </div>
    
</div>