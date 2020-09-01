@extends('admin.admin')

@section('contents')
@if (count($errors)>0)
            <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul>
                @foreach ($errors ->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
@endif
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success! - </strong>{{ $message }}
    </div>
@endif
<div class="d-flex justify-content-center align-items-center">
    <form class="w-50 mt-5 text-center" method="POST" action="{{ route('user-management.store') }}">
        @csrf
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="colFormLabel" placeholder="Input an email">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="role">Options</label>
            </div>
            <select class="custom-select" id="role" name="role">
                <option selected>Choose...</option>
                <option value="1">User</option>
                <option value="2">Teacher</option>
                <option value="0">Admin</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
</div>
@endsection
