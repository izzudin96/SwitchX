@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Website Status
        </div>
        <div class="container">
            <div class="col-md-5">
                <ul>
                    <li>Domain - www.kopiahmedia.com</li>
                    <li>Site status - <label for="status" class="label label-success">Active</label></li>
                    <li>Next Due date - 31/12/16</li>
                    <li>Last payment date - 31/12/17</li>
                    <li>Next due payment - RM 35.50</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="col-md-2">
    @include('dashboard/sidebar')
</div>

@endsection