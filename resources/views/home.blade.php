@extends('layouts.app')

@section('content')
    <h1 class="text-center">Add New Proposal</h1>
    <hr>
    <div class="container">
        <form action="{{route('proposal')}}" method="post">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <h5 style="text-decoration: underline;">Proposal Details</h5>
                <div class="form-group">
                    <label for="title">Proposal Title</label>
                    <input type="text" class="form-control" id="productName"  name="p_name" required>
                </div>
                <h5 style="text-decoration: underline;">Organization</h5>
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" id="productName"  name="org_name" required>
                </div>
                <div class="form-group">
                    <label for="title">Address</label>
                    <input type="text" class="form-control" id="productName"  name="org_address" required>
                </div>
                <div class="form-group">
                    <label for="title">Phone</label>
                    <input type="text" class="form-control" id="productName"  name="org_phone" required>
                </div>
                <div class="form-group">
                    <label for="title">Email</label>
                    <input type="email" class="form-control" id="productName"  name="org_email" required>
                </div>
            </div>
            <div class="col-md-6">

                <h5 style="text-decoration: underline;">Submitted By:</h5>
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" id="productName"  name="client_name">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="productName"  name="client_title">
                </div>
                <div class="form-group">
                    <label for="title">Summary</label>
                    <input type="text" class="form-control" id="productName"  name="summary">
                </div>
                <div class="form-group">
                    <label for="title">Background</label>
                    <input type="text" class="form-control" id="productName"  name="background">
                </div>
                <div class="form-group">
                    <label for="title">Activities</label>
                    <input type="text" class="form-control" id="productName"  name="activities">
                </div>
                <div class="form-group">
                    <label for="title">Budget</label>
                    <input type="text" class="form-control" id="productName"  name="budget">
                </div>

            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="save_as_draft">Save as draft</button>&nbsp;
            <button type="submit" class="btn btn-primary" name="submit" value="save">Submit</button>
        </div>
        </form>

    </div>
@endsection
