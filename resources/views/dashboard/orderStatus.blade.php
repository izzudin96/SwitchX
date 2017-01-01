<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Manage Statuses
        </div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="/dashboard/order/status">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-4 control-label" for="message">
                        Status Message
                    </label>

                    <div class="col-md-6">
                        <input value="" type="text" class="form-control" name="message" placeholder="Order delivered.">
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

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Id</td>
                        <td>Message</td>
                        <td>Action</td>
                    </tr>
                    @foreach($statuses as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td>{{ $status->message }}</td>
                            <td>
                                <form method="POST" action="/dashboard/order/status/{{ $status->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field("DELETE") }}
                                    <button type="submit" class="btn btn-success">
                                        Delete Status
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>