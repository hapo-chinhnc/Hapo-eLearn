@extends('layouts.home')
@section('content')
<div class="container my-5">
    <div class="filter-find">
        <div class="d-flex align-items-center">
            <button class="btn filter-btn mr-2"><i class="fas fa-sliders-h mr-1"></i>Filter</button>
            <input type="text" placeholder="Search..." class="find-input">
            <i class="fas fa-search search-icon"></i>
        </div>
    </div>
    <div class="list-courses row d-flex justify-content-center">
        @if ( count($courses) > 0)
            @foreach ($courses as $course)
                <div class="course-item col-11 col-xl-5 row mb-4 p-4">
                    <div class="course-item-image col-3 d-flex align-items-center">
                        <img src="{{ asset('storage/images/HTMLCSS.png') }}" class="img-fluid">
                    </div>
                    <div class="course-item-content col-9">
                        <div class="course-item-content-tittle">
                            {{ $course->title }}
                        </div>
                        <div class="course-item-content-text">
                            {{ $course->description }}
                        </div>
                    </div>
                    <div class="col-3 offset-8">
                       <a href="{{ route('courses.show', $course->id) }}"><button class="btn course-item-btn px-4 mt-4">More</button></a>
                    </div>
                    <div class="course-item-statistic col-12 d-flex justify-content-between">
                        <div>
                            <div class="course-item-statistic-title">Learners</div>
                            <div class="course-item-statistic-number">1,000</div>
                        </div>
                        <div>
                            <div class="course-item-statistic-title">Lessons</div>
                            <div class="course-item-statistic-number">1,000</div>
                        </div>
                        <div>
                            <div class="course-item-statistic-title">Quizzes</div>
                            <div class="course-item-statistic-number">1,000</div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
               <h1>NO THING TO SHOW</h1>
        @endif
    </div>
    <div class="col-12 d-flex justify-content-end">
        {{ $courses->links() }}
    </div>
</div>
@endsection
