@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Manage Users
        </div>
        
        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td>Orders Made</td>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><li>Admin</li></td>
                            <td>View</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="col-md-2">
    @include('dashboard/sidebar')
</div>

@endsection