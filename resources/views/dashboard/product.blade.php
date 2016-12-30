@extends('layouts.app')

@section('content')

<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            Manage Products
        </div>
        
        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Edit</td>
                        <td>Stock</td>
                        <td>Images</td>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><a href="/product/{{ $product->uri($product->name) }}">{{ $product->name }}</a></td>
                            <td>{{ $product->price }}</td>
                            <td><a href="/product/{{ $product->uri($product->name) }}/edit">Manage</a></td>
                            <td><a href="/product/{{ $product->uri($product->name) }}/stock">Manage</a></td>
                            <td><a href="/product/{{ $product->uri($product->name) }}/image">Manage</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>

    </div>
</div>

<div class="col-md-2">
    @include('dashboard/sidebar')
</div>

@endsection