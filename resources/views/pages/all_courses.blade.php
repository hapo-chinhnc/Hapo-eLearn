@extends('layouts.home')
@section('title')
    All Courses
@endsection
@section('content')
<div class="container my-5">
        <div class="filter-find row">
            <div class="d-flex align-items-center">
                <button class="btn filter-btn mr-2 py-2" id="filterBtn"><i class="fas fa-sliders-h mr-1"></i>Filter</button>
                <form action="{{ route('course.search') }}" method="GET">
                <input type="text" placeholder="Search..." class="find-input p-2" name="name_course" value="{{ request('name_course') }}">
                <i class="fas fa-search search-icon"></i>
                <input type="submit" class="find-btn" value="Search">
            </div>
        </div>
        <div class="course-filter row mt-3" id="filterTable">
            <div class="d-flex">
                <div class="col-1 filter-title p-3">Filter</div>
                <div class="col-10 d-flex flex-wrap">
                    <div class="order-by-time">
                        <input type="radio" name="order_by_time" id="newest" hidden value="0">
                        <label for="newest" class="px-4 py-2">Newest</label>
                    </div>
                    <div class="order-by-time">
                        <input type="radio" name="order_by_time" id="oldest" hidden value="1">
                        <label for="oldest" class="px-4 py-2">Oldest</label>
                    </div>
                    <input type="text" value="{{ request('order_by_time') }}" hidden id="order">
                    <div class="filter-select">
                        <select name="teacher" class="custom-select">
                            <option selected value="0">Teacher</option>
                            @foreach ($teachers as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" id="teacherId" value="{{ request('teacher') }}" hidden>
                    </div>
                    <div class="filter-select">
                        <select name="tags" class="custom-select">
                            <option value="0">Tag</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->tag_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-select">
                        <select name="students" class="custom-select">
                            <option value="0">Number Students</option>
                            <option value="most">Most Students</option>
                            <option value="least">Least Students</option>
                        </select>
                    </div>
                    <div class="filter-select">
                        <select name="lessons" class="custom-select">
                            <option value="0">Number Lessons</option>
                            <option value="most">Most Lessons</option>
                            <option value="least">Least Lessons</option>
                        </select>
                    </div>
                    <div class="filter-select">
                        <select name="reviews" class="custom-select">
                            <option value="0">Reviews</option>
                            <option value="most">Most Reviews</option>
                            <option value="least">Least Reviews</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="list-courses row d-flex justify-content-center">
        @if ($courses)
            @foreach ($courses as $course)
                <div class="course-item col-11 col-xl-5 row mb-4 p-4">
                    <div class="course-item-image">
                        <img src="{{ asset('storage/images/' . $course->image) }}" class="img-fluid courses-img">
                    </div>
                    <div class="course-item-content col-9">
                        <div class="course-item-content-tittle">
                            {{ $course->title }}
                        </div>
                        <div class="course-item-content-text">
                            {{ $course->description }}
                        </div>
                    </div>
                    <div class="d-flex justify-content-between w-100 align-items-center mt-3">
                        <h5 class="pl-3"><b>Reviews: {{ $course->review_times }}</b></h5>
                        @if (Auth::check())
                            <a href="{{ route('courses.show', $course->id) }}"><button class="btn course-item-btn px-4">More</button></a>
                        @else
                            <a href="#" href="#" data-toggle="modal" data-target="#loginRegister"><button class="btn course-item-btn px-4 mt-4">More</button></a>
                        @endif
                    </div>
                    <div class="course-item-statistic col-12 d-flex justify-content-between">
                        <div>
                            <div class="course-item-statistic-title">Learners</div>
                            <div class="course-item-statistic-number">{{ $course->course_user }}</div>
                        </div>
                        <div>
                            <div class="course-item-statistic-title">Lessons</div>
                            <div class="course-item-statistic-number">{{ $course->course_lesson }}</div>
                        </div>
                        <div>
                            <div class="course-item-statistic-title">Times</div>
                            <div class="course-item-statistic-number">{{ $course->course_time }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
               <h1>NO THING TO SHOW</h1>
        @endif
    </div>
    <div class="col-12 d-flex justify-content-end">
        {{ $courses->appends($_GET)->links() }}
    </div>
</div>
@endsection
