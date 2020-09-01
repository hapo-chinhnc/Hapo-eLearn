@extends('admin.admin')

@section('contents')
    @if (count($errors)>0)
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            @foreach ($errors ->all() as $err)
                <strong>Errors! - </strong>{{ $err }}<br>
            @endforeach
        </div>
    @endif
    @if ($message = Session::get('succses'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success! - </strong>{{ $message }}
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <form action="{{ route('user-management.update', $user->id) }}" method="POST" class="mt-5 text-center w-50">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="colFormLabel" value="{{ $user->email }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" >
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="password" id="password" value="{{ $user->password }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="role">Options</label>
                </div>
                <input type="number" id="roleVal" value="{{ $user->role }}" hidden>
                <select class="custom-select" id="role" name="role">
                    <option value="1">User</option>
                    <option value="2">Teacher</option>
                    <option value="0">Admin</option>
                </select>
            </div>
        <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
@endsection
