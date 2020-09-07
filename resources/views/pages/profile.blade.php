@extends('layouts.home')
@section('title')
    Profile | {{ $user->name }}
@endsection
@section('content')
    <div class="container">
        @if ($message = Session::get('succses'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success! - </strong>{{ $message }}
            </div>
        @endif
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" enctype="multipart/form-data" action="{{ route('profile.avatar', $user->id) }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Update Image</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="input-file">
                            <input type="file" name="avatar" id="avatar" class="d-none">
                            <label for="avatar" class="input-label">
                                <i class="fas fa-cloud-upload-alt icon-upload"></i>
                            </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <img src="#" id="avatarUpload" class="rounded-circle img-fluid img-upload d-none">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" value="Update">
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3">
                <div class="text-center border-profile">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-center flex-column">
                            <img src="{{ asset('storage/images/' . $user->avatar) }}" class="img-fluid rounded-circle img-thumbnail profile-avatar">
                            <button class="btn btn-img" data-toggle="modal" data-target="#myModal"><i class="fas fa-camera"></i></button>
                        </div>
                    </div>
                    <div class="user-name">{{ $user->name }}</div>
                    <div class="pb-2">{{ $user->email }}</div>
                </div>
                <div class="border-profile p-2 my-2">
                    <i class="fas fa-birthday-cake text-danger mr-2"></i>{{ date('d-m-Y', strtotime($user->birth_day)) }}
                </div>
                <div class="border-profile p-2 my-2">
                    <i class="fas fa-phone-alt text-orange mr-2"></i></i>{{ $user->phone }}
                </div>
                <div class="border-profile p-2 my-2">
                    <i class="fas fa-home text-info mr-2"></i>{{ $user->address }}
                </div>
                <div class="text-justify">
                    {{ $user->about }}
                </div>
            </div>
            <div class="col-8">
                <div class="mt-5">
                    <div class="profile-title border-double">My Course</div>
                    <div class="d-flex justify-content-center flex-wrap mt-4">
                        @foreach ($courseList as $course)
                        <div class="d-flex flex-column justify-content-center mx-3">
                            <a href="{{ route('courses.show', $course->id) }}" class="mx-auto"><img src="{{ url('storage/images/', $course->image) }}" class="user-course-image"></a>
                            <div class="text-center">{{ $course->title }}</div>
                        </div>
                        @endforeach
                        <div class="d-flex flex-column justify-content-center mx-3">
                            <a href="{{ route('courses.index') }}" class="mx-auto"><img src="{{ asset('storage/images/add-course.png') }}"></a>
                            <div class="text-center text-success">Add course</div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="profile-title border-double">Edit profile</div>
                    <form action="{{ route('profile.update', $user->id) }}" class="row mt-4" method="POST">
                        @csrf
                        <div class="form-group col-6">
                            <label for="formName" class="lable-title">Name:</label>
                            <input type="text" name="name" class="form-control" id="formName" placeholder="Your Name..." value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-6">
                            <label for="formEmail" class="lable-title">Email:</label>
                            <input type="email" name="email_update" class="form-control" id="formEmail" placeholder="Your Email..." value="{{ $user->email }}">
                        </div>
                        <div class="form-group col-6">
                            <label for="formDate" class="lable-title">Date of birthday:</label>
                            <input type="date" name="birth_day" class="form-control" id="formDate" value="{{ $user->birth_day }}">
                        </div>
                        <div class="form-group col-6">
                            <label for="formPhone" class="lable-title">Phone:</label>
                            <input type="text" name="phone" class="form-control" id="formPhone" placeholder="Your phone number..." value="{{ $user->phone }}">
                        </div>
                        <div class="form-group col-6">
                            <label for="formAddress" class="lable-title">Address:</label>
                            <input type="text" name="address" class="form-control" id="formAddress" placeholder="Your Address" value="{{ $user->address }}">
                        </div>
                        <div class="d-flex flex-column ml-3">
                            <label for="formAbout" class="lable-title">About me:</label>
                            <textarea name="about" id="formAbout" cols="44" class="form-control" rows="6" placeholder="About you...">{{ $user->about }}</textarea>
                        </div>
                        <input type="submit" class="btn btn-learn mt-3 col-4 mx-auto" value="Update">
                    </form>
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
                </div>
            </div>
        </div>
    </div>
@endsection
