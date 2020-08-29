@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="course-detail-image d-flex justify-content-center mt-3">
                    <img src="{{ asset('storage/images/HTMLCSS.png') }}" class="img-fluid p-5">
                </div>
                <div class="course-detail w-100 d-flex flex-column justify-content-center">
                    <div class="course-detail-lesson w-100 p-3">
                        <div class="course-detail-lesson-header d-flex mb-4">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-lessons-tab" data-toggle="tab" href="#nav-lessons" role="tab" aria-controls="nav-lessons" aria-selected="true">Lessons</a>
                                    <a class="nav-link" id="nav-teacher-tab" data-toggle="tab" href="#nav-teacher" role="tab" aria-controls="nav-teacher" aria-selected="false">Teacher</a>
                                    <a class="nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews</a>
                                </div>
                            </nav>
                        </div>
                        <div class="filter-find mb-3">
                            <div class="d-flex align-items-center">
                                <button class="btn filter-btn mr-2"><i class="fas fa-sliders-h mr-1"></i>Filter</button>
                                <input type="text" placeholder="Search..." class="find-input">
                                <i class="fas fa-search search-icon"></i>
                            </div>
                        </div>
                        <div class="tab-content lesson-detail" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-lessons" role="tabpanel" aria-labelledby="nav-lessons-tab">
                                <div class="course-detail-lesson-detail">
                                    @if (count($lessons) > 0)
                                        @foreach ($lessons as $key => $lesson)
                                            <div class="d-flex justify-content-between align-items-center p-3 border-top-bot">
                                                <p class="my-auto">{{ ++$key . ": " . $lesson->title }}</p>
                                                <a href="{{ route('lesson.detail', $lesson->id) }}"><button class="btn btn-learn">Learn</button></a>
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
                            <div class="tab-pane fade" id="nav-teacher" role="tabpanel" aria-labelledby="nav-teacher-tab">
                                <div class="lesson-detail-title">Main Teacher</div>
                                <div class="mt-4">
                                    <div class="teacher-info align-items-center mt-4">
                                        <img src="{{ asset('storage/images/nghialuuu.jpg') }}" class="teacher-info-img rounded-circle">
                                        <div class="d-flex flex-column ml-4">
                                            <div class="teacher-info-name">{{ $course->teacher->name }}</div>
                                            <div class="teacher-info-exp">Second Year Teacher</div>
                                            <div class="d-flex mt-2">
                                                <div class="teacher-info-gplus"><i class="fab fa-google-plus-g"></i></div>
                                                <div class="teacher-info-fb"><i class="fab fa-facebook-f"></i></i></div>
                                                <div class="teacher-info-slack"><i class="fab fa-slack"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="teacher-text">
                                        Vivamus volutpat eros pulvinar velit laoreet,
                                        sit amet egestas erat dignissim. Sed quis rutrum tellus,
                                        sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                                        Nam nulla ipsum, venenatis malesuada felis quis,
                                        ultricies convallis neque. Pellentesque tristique
                                    </div>
                                </div>
                            </div>
                            @php
                                $fullStar = 5;
                                $allRevewTimes = $course->review_times;
                                $avgStar = $course->avg_star;
                            @endphp
                            <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                                <div class="lesson-detail-title pb-4">{{ $allRevewTimes }} Reviews</div>
                                <div class="rating d-flex py-4">
                                    <div class="d-flex flex-column justify-content-center align-items-center rating-star p-5">
                                        <div class="rating-star-number">{{ $avgStar }}/5</div>
                                        <div>
                                            @for ($i = 0; $i < $fullStar; $i++)
                                                @if ($i < $avgStar)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="rating-times">{{ $allRevewTimes }} reviews</div>
                                    </div>
                                    <div class="total-star ml-4 px-3">
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">5 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-success" style="width: {{ $course->PrecentRating('5') }}%"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes('5') }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">4 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-info" style="width: {{ $course->PrecentRating('4') }}%"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes('4') }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">3 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-warning" style="width:{{ $course->PrecentRating('3') }}%"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes('3') }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">2 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-secondary" style="width:{{ $course->PrecentRating('2') }}%"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes('2') }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">1 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-danger" style="width:{{ $course->PrecentRating('1') }}%"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes('1') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-reviews">
                                    <div class="user-reviews-title my-4"><strong> Show all reviews</strong></div>
                                    @foreach ($reviews as $review)
                                        <div class="user-review-item mt-3">
                                            <div class="user-review-item-info d-flex align-items-center">
                                                <img src="{{ asset('storage/images/user-img.jpg') }}" class="rounded-circle mx-3">
                                                <div class="user-reviews-title mr-2">{{ $review->user->name }}</div>
                                                @php
                                                    $star = $review->rating;
                                                @endphp
                                                <div class="mr-2">
                                                    @for ($i = 0; $i < $fullStar; $i++)
                                                        @if ($i < $star)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <div class="review-time ml-5">{{ $review->created_at }}</div>
                                            </div>
                                            <div class="user-review-text mx-3 mt-3 pb-3">
                                               {{ $review->content }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div>
                                    <div class="lesson-detail-title">Leave a Comment</div>
                                    <textarea name="comment" id="" cols="30" rows="5" class="form-control mb-3" placeholder="Message"></textarea>
                                    <button class="btn btn-learn px-3 ml-3">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="descriptions-course p-3 mt-3">
                    <div class="descriptions-course-title pb-3">Descriptions course</div>
                    <div class="descriptions-course-content mt-2">{{ $course->description }}</div>
                </div>
                <div class="course-info h-50 w-100 px-0">
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
                        <i class="fas fa-hashtag"></i> Tags: {{ $course->course_tag }}
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
    </div>
@endsection
