@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="course-detail-image d-flex justify-content-center mr-0">
                    <img src="{{ asset('storage/images/HTMLCSS.png') }}" class="img-fluid py-5">
                </div>
                <div class="course-detail">
                    <div class="course-detail-lesson p-3">
                        <div class="course-detail-lesson-header d-flex mb-4">
                            <div class="mr-5 pb-3">Lesson</div>
                            <div class="mr-5 pb-3">Teacher</div>
                            <div class="mr-5 pb-3">Program</div>
                            <div class="mr-5 pb-3">Reviews</div>
                        </div>
                        <div class="lesson-detail">
                            <div class="lesson-detail-title">Descriptions lesson</div>
                            <div class="lesson-detail-text">
                               {{ $lesson->description }}
                            </div>
                            <div class="lesson-detail-title">Requirements</div>
                            <div class="lesson-detail-text">
                                {{ $lesson->requirement }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="course-info">
                    <div class="course-info-text">
                        <i class="fas fa-desktop"></i> Course: {{ $lesson->course->title }}
                    </div>
                    <div class="course-info-text">
                        <i class="fas fa-users"></i> Learners: {{ $lesson->lesson_user }}
                    </div>

                    <div class="course-info-text">
                        <i class="far fa-clock"></i> Times:  {{ $lesson->time }} minutes
                    </div>
                    <div class="course-info-text">
                        <i class="fas fa-hashtag"></i> Tags: #tag1 #tag2
                    </div>
                    <div class="course-info-text">
                        <i class="far fa-money-bill-alt"></i> Price: 11
                    </div>
                </div>
                <div class="mt-3">
                    <div class="course-info-tittle d-flex justify-content-center align-items-center">Other Courses</div>
                    <div class="other-list">
                        @foreach($otherCourses as $key => $otherCourse)
                            <div class="other-list-item py-3 row mx-0 ">
                                <div class="col-1 no-gutters-custom ml-3"><strong>{{ ++$key }}</strong></div>
                                <a href="" class="col-10 no-gutters-custom">{{ $otherCourse->title }}</a>
                            </div>
                        @endforeach
                        <div class="text-center p-4">
                            <button class="btn btn-learn p-2 px-4" onclick="location.href='{{ route('courses.index') }}'">View all ours courses</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
