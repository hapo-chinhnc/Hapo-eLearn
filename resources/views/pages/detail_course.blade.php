@extends('layouts.home')
@section('title')
    Course | {{ $course->title }}
@endsection
@section('content')
    <div class="container">
        <div class="mt-2 d-flex align-items-center links-header">
            <a href="{{ route('home') }}" class="mx-3">Home</a>
            <i class="fas fa-angle-right"></i>
            <a href="{{ route('courses.index') }}" class="mx-3">All Courses</a>
            <i class="fas fa-angle-right"></i>
            <a href="" class="mx-3">{{ $course->title }}</a>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="course-detail-image d-flex justify-content-center">
                    <img src="{{ asset('storage/images/' . $course->image) }}" class="img-fluid course-img">
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
                        <div class="filter-find mb-3 d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <form action="{{ route('courses.show', $course->id) }}" method="GET">
                                    <input type="text" placeholder="Search..." class="find-input p-2" name="lesson_name" value="{{ request('lesson_name') }}">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="submit" class="find-btn m-n3" value="Search">
                                </form>
                            </div>
                            <div>
                                @if (empty($course->course_learned))
                                    <form action="{{ route('users_course.store', $course->id) }}" method="POST" class="text-center">
                                        @csrf
                                        <input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
                                        <input type="text" name="course_id" value="{{ $course->id }}" hidden>
                                        <input type="submit" value="Take This Course" class="btn take-leave" onclick="return confirm('Take This Course?');">
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="tab-content lesson-detail" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-lessons" role="tabpanel" aria-labelledby="nav-lessons-tab">
                                <div class="course-detail-lesson-detail">
                                    @if (count($lessons) > 0)
                                        @foreach ($lessons as $key => $lesson)
                                            <div class="d-flex justify-content-between align-items-center p-3 border-top-bot">
                                                <p class="my-auto">{{ $lessons->firstItem() + $key . ": " . $lesson->title }}</p>
                                                @if($course->course_learned)
                                                    @if ($lesson->lesson_learned)
                                                        <a href="{{ route('lesson.detail', $lesson->id) }}"><button class="btn btn-learn">Continue</button></a>
                                                    @else
                                                        <form action="{{ route('lesson_users.store', $lesson->id) }}" method="POST" class="text-center">
                                                            @csrf
                                                            <input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
                                                            <input type="text" hidden value="{{ $lesson->id }}" name="lesson_id">
                                                            <input type="submit" value="Learn" class="btn btn-learn">
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        @endforeach
                                        <div class="mt-4 float-right">
                                            {{ $lessons->appends(['lesson_name'=>request()->input('lesson_name')])->links('vendor.pagination.page_pagination') }}
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
                                        <img src="{{ asset('storage/images/user-img.jpg') }}" class="teacher-info-img rounded-circle">
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
                                        {{ $course->teacher->about }}
                                    </div>
                                </div>
                            </div>
                            <input type="text" value="{{ $course->PrecentRating($ratingStar['full_star']) }}%" hidden id="fullStarVal">
                            <input type="text" value="{{ $course->PrecentRating($ratingStar['good_rating']) }}%" hidden id="goodRatingVal">
                            <input type="text" value="{{ $course->PrecentRating($ratingStar['normal_rating']) }}%" hidden id="normalRatingVal">
                            <input type="text" value="{{ $course->PrecentRating($ratingStar['bad_rating']) }}%" hidden id="badRatingVal">
                            <input type="text" value="{{ $course->PrecentRating($ratingStar['very_bad_rating']) }}%" hidden id="veryBadRatingVal">
                            <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                                <div class="lesson-detail-title pb-4">{{ $course->review_times }} Reviews</div>
                                <div class="rating d-flex py-4">
                                    <div class="d-flex flex-column justify-content-center align-items-center rating-star p-5">
                                        <div class="rating-star-number">{{ $course->avg_star }}/5</div>
                                        <div>
                                            @for ($i = 0; $i < $ratingStar['full_star']; $i++)
                                                @if ($i < $course->avg_star)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="rating-times">{{ $course->review_times }} reviews</div>
                                    </div>
                                    <div class="total-star ml-4 px-3">
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">5 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-success" id="fullStar"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes($ratingStar['full_star']) }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">4 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-info" id="goodRating"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes($ratingStar['good_rating']) }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">3 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-warning" id="normalRating"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes($ratingStar['normal_rating']) }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">2 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-danger" id="badRating"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes($ratingStar['bad_rating']) }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">1 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-dark" id="veryBadRating"></div>
                                            </div>
                                            <div class="total-star-title">{{ $course->RatingTimes($ratingStar['very_bad_rating']) }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-reviews">
                                    <button class="user-reviews-title my-4 btn" id="showAllReview"><strong>Show all reviews</strong></button>
                                    @foreach ($reviews as $keyReview => $review)
                                        <div class="user-review-item mt-3 {{ $keyReview > 4  ? 'd-none' : '' }}">
                                            <div class="user-review-item-info d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('storage/images/' . $review->user->avatar) }}" class="rounded-circle mx-3">
                                                    <div class="user-reviews-title mr-2">{{ $review->user->name }}</div>
                                                    <div class="mr-2">
                                                        @for ($i = 0; $i < $ratingStar['full_star']; $i++)
                                                            @if ($i < $review->rating)
                                                                <i class="fas fa-star icon"></i>
                                                            @else
                                                                <i class="far fa-star icon"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="review-time ml-5">{{ $review->created_at }}</div>
                                                </div>
                                                @if (($review->user->id) == Auth::id())
                                                    <div class="d-flex align-items-center">
                                                        <button type="button" class="btn p-0 mr-3 edit-btn" id="{{ $review->id }}"><i class="fas fa-pen-square edit-icon"></i></button>
                                                        <form action="{{ route('review.destroy',  $review->id) }}" method="GET" class="delete-form">
                                                            @method('DELETE')
                                                            <button class="btn p-0" onclick="return confirm('Delete This ?')"><i class="fas fa-trash trash"></i></button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="user-review-text mx-3 mt-3 pb-3">
                                                <div class="review" id="content{{ $review->id }}">{{ $review->content }}</div>
                                                <form method="POST" action="{{ route('review.update', $review->id) }}" class="pb-5 form-edit-review" id="updateReview{{ $review->id }}">
                                                    @csrf
                                                    <textarea required name="update_review" rows="5" class="form-control w-100">{{ $review->content }}</textarea>
                                                    <fieldset class="rating mt-2">
                                                        <input type="radio" id="starFiveUpdate" name="update_rating" value="5" required/><label for="starFiveUpdate" title="Rocks!">5 stars</label>
                                                        <input type="radio" id="starForUpdate" name="update_rating" value="4" /><label for="starForUpdate" title="Pretty good">4 stars</label>
                                                        <input type="radio" id="starThreeUpdate" name="update_rating" value="3" /><label for="starThreeUpdate" title="Meh">3 stars</label>
                                                        <input type="radio" id="starTwoUpdate" name="update_rating" value="2" /><label for="starTwoUpdate" title="Kinda bad">2 stars</label>
                                                        <input type="radio" id="starOneUpdate" name="update_rating" value="1" /><label for="starOneUpdate" title="Sucks big time">1 star</label>
                                                    </fieldset>
                                                    <div class="float-right mt-2">
                                                        <button type="button" class="btn btn-light cancel-btn"><b>Cancel</b></button>
                                                        <input type="submit" class="btn btn-learn" value="Update">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="user-reviews-title btn" id="showAllReviewBottom"><strong>All Reviews</strong></button>
                                </div>
                                <div>
                                    <div class="lesson-detail-title">Leave a Comment</div>
                                    <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <textarea name="content" cols="30" rows="5" class="form-control mb-3 w-100" required placeholder="Message"></textarea>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3 lesson-detail-title">Vote:</div>
                                                <input type="text" name="course_id" value="{{ $course->id }}" hidden>
                                                <fieldset class="rating mt-2">
                                                    <input type="radio" id="starFive" name="rating" value="5" required/><label for="starFive" title="Rocks!">5 stars</label>
                                                    <input type="radio" id="starFor" name="rating" value="4" /><label for="starFor" title="Pretty good">4 stars</label>
                                                    <input type="radio" id="starThree" name="rating" value="3" /><label for="starThree" title="Meh">3 stars</label>
                                                    <input type="radio" id="starTwo" name="rating" value="2" /><label for="starTwo" title="Kinda bad">2 stars</label>
                                                    <input type="radio" id="starOne" name="rating" value="1" /><label for="starOne" title="Sucks big time">1 star</label>
                                                </fieldset>
                                            </div>
                                            <button type="submit" class="btn btn-learn px-3 ml-3"> Send </button>
                                        </div>
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
                </div>
            </div>
            <div class="col-4">
                <div class="descriptions-course p-3">
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
                        <i class="far fa-clock"></i> Times: {{ $course->course_time }}
                    </div>
                    <div class="course-info-text d-flex flex-wrap">
                        <i class="fas fa-hashtag"></i> Tags:
                        @foreach ($tags as $tag)
                            <form action="{{ route('tag.search', $tag->id) }}" class="mx-1 mt-n1 mb-1">
                                <label for="{{ $tag->id }}"><span class="badge badge-light badge-custom p-2 mt-2">{{ $tag->tag_title }}</span></label>
                                <input type="submit" hidden id="{{ $tag->id }}">
                            </form>
                        @endforeach
                    </div>
                    <div class="course-info-text">
                        <i class="far fa-money-bill-alt"></i> Price: {{ $course->price }}
                    </div>
                    @if($course->course_learned)
                        <div class="course-info-text">
                            <div class="w-100 text-center">
                                <form action="{{ route('users_course.destroy',  Auth::id()) }}" method="GET" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn take-leave" onclick="return confirm('Leave Course?');">Leave This Course</i></button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="mt-3">
                        <div class="course-info-tittle d-flex justify-content-center align-items-center">Other Courses</div>
                        <div class="other-list">
                            @foreach ($otherCourses as $key => $other)
                                <div class="other-list-item py-3 row mx-0 ">
                                    <div class="col-1 no-gutters-custom ml-3 links-course">{{ ++$key }}</div>
                                    <a href="{{ route('courses.show', $other->id) }}" class="col-10 no-gutters-custom links-course">{{ $other->title }}</a>
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
