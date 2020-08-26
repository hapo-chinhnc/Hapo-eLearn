@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="course-detail-image d-flex justify-content-center col-7">
                <img src="{{ asset('storage/images/HTMLCSS.png') }}" class="img-fluid p-5">
            </div>
            <div class="ml-1 descriptions-course p-3 col-4 ml-5">
                <div class="descriptions-course-title">Descriptions course</div>
                <div class="descriptions-course-content">{{ $course->description }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="course-detail w-100 d-flex flex-column justify-content-center">
                    <div class="course-detail-lesson w-100 p-3">
                        <div class="course-detail-lesson-header d-flex mb-4">
                            <div class="mr-5 pb-3">Lesson</div>
                            <div class="mr-5 pb-3">Teacher</div>
                            <div class="mr-5 pb-3">Reviews</div>
                        </div>
                        <div class="filter-find mb-3">
                            <div class="d-flex align-items-center">
                                <button class="btn filter-btn mr-2"><i class="fas fa-sliders-h mr-1"></i>Filter</button>
                                <input type="text" placeholder="Search..." class="find-input">
                                <i class="fas fa-search search-icon"></i>
                            </div>
                        </div>
                        <div class="course-detail-lesson-detail">
                            @if (count($lessons) > 0)
                                @foreach ($lessons as $key => $lesson)
                                    <div class="d-flex justify-content-between align-items-center p-3 border-top-bot">
                                        <p class="my-auto">{{ ++$key . ": " . $lesson->title }}</p>
                                        <button class="btn btn-learn">Learn</button>
                                    </div>
                                @endforeach
                                <div class="mt-4 ">
                                    <div class="pagination">
                                        {{ $lessons->links() }}
                                    </div>
                                </div>
                            @else
                                <h1 class="text-center mt-3">No lesson available</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 course-info h-50 ml-5 w-100 px-0">
                <div class="course-info-text">
                    <i class="fas fa-users"></i> Learners: {{ $course->course_user }}
                </div>
                <div class="course-info-text">
                    <i class="far fa-list-alt"></i> Lessons: {{ $course->course_lesson }} lessons
                </div>
                <div class="course-info-text">
                    <i class="far fa-clock"></i> Times: {{ $course->course_time }} minutes
                </div>
                <div class="course-info-text">
                    <i class="fas fa-hashtag"></i> Tags: #tag1 #tag2
                </div>
                <div class="course-info-text">
                    <i class="far fa-money-bill-alt"></i> Price: {{ $course->price }}
                </div>
                <div class="mt-3">
                    <div class="course-info-tittle d-flex justify-content-center align-items-center">Other Courses</div>
                    <div class="other-list">
                        @foreach ($otherCourses as $key => $other)
                            <div class="other-list-item py-3 row mx-0 ">
                                <div class="col-1 no-gutters-custom ml-3"><strong>{{ ++$key }}</strong></div>
                                <a href="{{ route('courses.show', $other->id) }}" class="col-10 no-gutters-custom">{{ $other->title }}</a>
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
