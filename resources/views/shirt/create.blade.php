@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a New Shirt</div>
                <div class="panel-body">
                    <form class="form-horizontal" role='form' method="POST" action="/shirt">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Name</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" placeholder="What is the shirt name?">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-3 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea placeholder="What is the shirt description?" name="description" class="form-control" rows="5"></textarea>

                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-3 control-label">Price (RM)</label>
                            <div class="col-md-8">
                                <input min="0" type="number" class="form-control" name="price" placeholder="The price?">

                                @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('xxs') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">xxs</label>
                            <div class="col-md-8">
                                <input min="0" type="number" id="xxs" type="text" class="form-control" name="xxs" placeholder="How many stock for xxs left?">

                                @if ($errors->has('xxs'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('xxs') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('xs') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">xs</label>
                            <div class="col-md-8">
                                <input min="0" type="number" id="xs" type="text" class="form-control" name="xs" placeholder="How many stock for xs left?">

                                @if ($errors->has('xs'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('xs') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('s') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">s</label>
                            <div class="col-md-8">
                                <input min="0" type="number" id="s" type="text" class="form-control" name="s" placeholder="How many stock for s left?">

                                @if ($errors->has('s'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('s') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('m') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">m</label>
                            <div class="col-md-8">
                                <input min="0" type="number" id="m" type="text" class="form-control" name="m" placeholder="How many stock for m left?">

                                @if ($errors->has('m'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('m') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('l') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">l</label>
                            <div class="col-md-8">
                                <input min="0" type="number" id="l" type="text" class="form-control" name="l" placeholder="How many stock for l left?">

                                @if ($errors->has('l'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('l') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('xl') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">xl</label>
                            <div class="col-md-8">
                                <input min="0" type="number" id="xl" type="text" class="form-control" name="xl" placeholder="How many stock for xl left?">

                                @if ($errors->has('xl'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('xl') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('xxl') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">xxl</label>
                            <div class="col-md-8">
                                <input min="0" type="number" id="xxl" type="text" class="form-control" name="xxl" placeholder="How many stock for xxl left?">

                                @if ($errors->has('xxl'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('xxl') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('xxxl') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">xxxl</label>
                            <div class="col-md-8">
                                <input min="0" type="number" id="xxxl" type="text" class="form-control" name="xxxl" placeholder="How many stock for xxxl left?">

                                @if ($errors->has('xxxl'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('xxxl') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-bolt"></i> Create Shirt
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection