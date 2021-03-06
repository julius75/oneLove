@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: whitesmoke">
        <form action="{{route('store')}}" method="post">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <h5 style="text-decoration: underline;">Proposal Details</h5>
                <div class="form-group">
                    <label for="title">Proposal Title</label>
                    <input type="text" class="form-control"   name="title" required >
                </div>
                <h5 style="text-decoration: underline;">Organization</h5>
                <div class="form-group">
                    <label for="organization_name">Name</label>
                    <input type="text" class="form-control"   name="organization_name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control"  name="address" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control"  name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"  name="email" required>
                </div>
            </div>
            <div class="col-md-6">

                <h5 style="text-decoration: underline;">Submitted By:</h5>
                <div class="form-group">
                    <label for="submitted_by_name">Name</label>
                    <input type="text" class="form-control"  name="submitted_by_name" required>
                </div>
                <div class="form-group">
                    <label for="title_organization">Title</label>
                    <input type="text" class="form-control"  name="title_organization" required>
                </div>
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <input type="" class="form-control"  name="summary" required>
                </div>
                <div class="form-group">
                    <label for="title">Background</label>
                    <input type="text" class="form-control"  name="background" required>
                </div>
                <div class="form-group">
                    <label for="background">Activities</label>
                    <input type="text" class="form-control"  name="activities" required>
                </div>
                <div class="form-group">
                    <label for="title">Budget</label>
                    <input type="text" class="form-control"  name="budget" required>
                </div>

            </div>
            <div class="form-group">
            {{--<button type="submit" class="btn btn-primary" name="submit" value="save_as_draft">Save as draft</button>&nbsp;--}}
            <button type="submit" value="save"  name="send" class="btn btn-primary">Submit For Review </button>
            <button type="submit" value="draft" name="send" class="btn btn-primary">Save To Draft</button>
            </div>
        </div>

        @include('layouts.errors')


        </form>

    </div>
@endsection
