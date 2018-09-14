@extends('layouts.app')
<h1>Add New Product</h1>
    <hr>
@section('content')
    <div class="container">
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Product Name</label>
            <input type="text" class="form-control" id="productName"  name="name">
        </div>
        <div class="form-group">
            <label for="description">Product Company</label>
            <select class="form-control" name="company">
                <option>Apple</option>
                <option>Google</option>
                <option>Mi</option>
                <option>Samsung</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Product Amount</label>
            <input type="text" class="form-control" id="productAmount" name="amount"/>
        </div>

        <div class="form-group">
            <label for="description">Product Description</label>
            <textarea type="text" class="form-control" id="productDescription" name="description"></textarea>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
