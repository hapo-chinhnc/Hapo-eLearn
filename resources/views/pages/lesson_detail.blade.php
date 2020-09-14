@extends('layouts.home')
@section('title')
    Lesson | {{ $lesson->title }}
@endsection
@section('content')
    <div class="container">
        <div class="mt-2 d-flex align-items-center links-header">
            <a href="{{ route('home') }}" class="mx-3">Home</a>
            <i class="fas fa-angle-right"></i>
            <a href="{{ route('courses.index') }}" class="mx-3">All Courses</a>
            <i class="fas fa-angle-right"></i>
            <a href="{{ route('courses.show', $lesson->course->id) }}" class="mx-3">{{ $lesson->course->title }}</a>
            <i class="fas fa-angle-right"></i>
            <a href="" class="mx-3">{{ $lesson->title }}</a>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="course-detail-image d-flex justify-content-center">
                    <img src="{{ asset('storage/images/'. $lesson->course->image) }}" class="img-fluid course-img">
                </div>
                <div class="course-detail">
                    <div class="course-detail-lesson p-3">
                        <div class="course-detail-lesson-header d-flex mb-4">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-descriptions-tab" data-toggle="tab" href="#nav-descriptions" role="tab" aria-controls="nav-descriptions" aria-selected="true">Descriptions</a>
                                    <a class="nav-link" id="nav-teacher-tab" data-toggle="tab" href="#nav-teacher" role="tab" aria-controls="nav-teacher" aria-selected="false">Teacher</a>
                                    <a class="nav-link" id="nav-program-tab" data-toggle="tab" href="#nav-program" role="tab" aria-controls="nav-program" aria-selected="false">Program</a>
                                    <a class="nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews</a>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content lesson-detail" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-descriptions" role="tabpanel" aria-labelledby="nav-descriptions-tab">
                                <div class="lesson-detail">
                                    <div class="lesson-detail-title">Descriptions lesson</div>
                                    <div class="lesson-detail-text">
                                        {{ $lesson->description }}
                                    </div>
                                    <div class="lesson-detail-title">Requirements</div>
                                    <div class="lesson-detail-text">
                                        {{ $lesson->requirement }}
                                    </div>
                                    <div class="lesson-detail-text d-flex align-items-center flex-wrap">
                                        <div class="lesson-detail-title pr-4">Tags:</div>
                                        @foreach ($courseTags as $tag)
                                            <form action="{{ route('tag.search', $tag->id) }}" class="mx-1 mt-2">
                                                <label for="{{ $tag->id }}"><span class="badge badge-light badge-custom p-2 mt-2">{{ $tag->tag_title }}</span></label>
                                                <input type="submit" hidden id="{{ $tag->id }}">
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-teacher" role="tabpanel" aria-labelledby="nav-teacher-tab">
                                <div class="lesson-detail-title">Main Teacher</div>
                                <div class="mt-4">
                                    <div class="teacher-info align-items-center mt-4">
                                        <img src="{{ asset('storage/images/user-img.jpg') }}" class="teacher-info-img rounded-circle">
                                        <div class="d-flex flex-column ml-4">
                                            <div class="teacher-info-name">{{ $lesson->course->teacher->name }}</div>
                                            <div class="teacher-info-exp">Second Year Teacher</div>
                                            <div class="d-flex mt-2">
                                                <div class="teacher-info-gplus"><i class="fab fa-google-plus-g"></i></div>
                                                <div class="teacher-info-fb"><i class="fab fa-facebook-f"></i></i></div>
                                                <div class="teacher-info-slack"><i class="fab fa-slack"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="teacher-text">
                                        {{ $lesson->course->teacher->about }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-program" role="tabpanel" aria-labelledby="nav-program-tab">
                                <div class="lesson-detail-title py-5">Program</div>
                                <div class="lesson-program d-flex flex-column">
                                    <div class="porgram-list py-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex">
                                                <i class="far fa-file-word col-1"></i>
                                                <div class="program-type col-2 p-0 ml-2">Lesson</div>
                                                <div class="m-0 col-9">Program learn HTML/CSS</div>
                                            </div>
                                            <button class="btn btn-learn">Preview</button>
                                        </div>
                                    </div>
                                    <div class="porgram-list py-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex">
                                                <i class="far fa-file-pdf col-1"></i>
                                                <div class="program-type col-2 p-0 ml-2">PDF</div>
                                                <div class="m-0 col-9">Download course slides</div>
                                            </div>
                                            <button class="btn btn-learn">Preview</button>
                                        </div>
                                    </div>
                                    <div class="porgram-list py-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex">
                                                <i class="far fa-file-video col-1"></i>
                                                <div class="program-type col-2 p-0 ml-2">Video</div>
                                                <div class="m-0 col-9">Download course videos</div>
                                            </div>
                                            <button class="btn btn-learn">Preview</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['full_star']) }}%" hidden id="fullStarVal">
                            <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['good_rating']) }}%" hidden id="goodRatingVal">
                            <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['normal_rating']) }}%" hidden id="normalRatingVal">
                            <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['bad_rating']) }}%" hidden id="badRatingVal">
                            <input type="text" value="{{ $lesson->LessonPrecentRating($ratingStar['very_bad_rating']) }}%" hidden id="veryBadRatingVal">
                            <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                                <div class="lesson-detail-title pb-4">{{ $lesson->lesson_review_times }} Reviews</div>
                                <div class="rating d-flex py-4">
                                    <div class="d-flex flex-column justify-content-center align-items-center rating-star p-5">
                                        <div class="rating-star-number">{{ $lesson->lesson_avg_star }}/5</div>
                                        <div>
                                            @for ($i = 0; $i < $ratingStar['full_star']; $i++)
                                                @if ($i < $lesson->lesson_avg_star)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="rating-times">{{ $lesson->lesson_review_times }} Ratings</div>
                                    </div>
                                    <div class="total-star ml-4 px-3">
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">5 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-success" id="fullStar"></div>
                                            </div>
                                            <div class="total-star-title">{{ $lesson->LessonRatingTimes($ratingStar['full_star']) }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">4 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-info" id="goodRating"></div>
                                            </div>
                                            <div class="total-star-title">{{ $lesson->LessonRatingTimes($ratingStar['good_rating']) }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">3 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-warning" id="normalRating"></div>
                                            </div>
                                            <div class="total-star-title">{{ $lesson->LessonRatingTimes($ratingStar['normal_rating']) }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">2 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-danger" id="badRating"></div>
                                            </div>
                                            <div class="total-star-title">{{ $lesson->LessonRatingTimes($ratingStar['bad_rating']) }}</div>
                                        </div>
                                        <div class="d-flex align-items-center my-3 justify-content-between">
                                            <div class="total-star-title">1 star</div>
                                            <div class="progress mx-2">
                                                <div class="progress-bar bg-dark" id="veryBadRating"></div>
                                            </div>
                                            <div class="total-star-title">{{ $lesson->LessonRatingTimes($ratingStar['very_bad_rating']) }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-reviews">
                                    <div class="user-reviews-title my-4"><strong> Show all reviews</strong></div>
                                    @foreach ($lessonReviews as $lessonReview)
                                        <div class="user-review-item">
                                            <div class="user-review-item-info d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('storage/images/user-img.jpg') }}" class="rounded-circle mx-3">
                                                    <div class="user-reviews-title mr-2">{{ $lessonReview->user->name }}</div>
                                                    <div class="mr-2">
                                                        @for ($i = 0; $i < $ratingStar['full_star']; $i++)
                                                            @if ($i < $lessonReview->rating)
                                                                <i class="fas fa-star icon"></i>
                                                            @else
                                                                <i class="far fa-star icon"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="review-time ml-5">{{ $lessonReview->created_at }}</div>
                                                </div>
                                                @if (($lessonReview->user->id) == Auth::id())
                                                    <div class="d-flex align-items-center">
                                                        <button type="button" class="btn p-0 mr-3 edit-btn" id="{{ $lessonReview->id }}"><i class="fas fa-pen-square edit-icon"></i></button>
                                                        <form action="{{ route('review.destroy',  $lessonReview->id) }}" method="GET" class="delete-form">
                                                            @method('DELETE')
                                                            <button class="btn p-0" onclick="return confirm('Delete This ?')"><i class="fas fa-trash trash"></i></button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="user-review-text mx-3 mt-3 pb-3">
                                                <div class="review" id="content{{ $lessonReview->id }}">{{ $lessonReview->content }}</div>
                                                <form method="POST" action="{{ route('review.update', $lessonReview->id) }}" class="pb-5 form-edit-review" id="updateReview{{ $lessonReview->id }}">
                                                    @csrf
                                                    <textarea required name="update_review" rows="5" class="form-control w-100">{{ $lessonReview->content }}</textarea>
                                                    <fieldset class="rating mt-2">
                                                        <input type="radio" id="starFive" name="update_rating" value="5" required/><label for="starFive" title="Rocks!">5 stars</label>
                                                        <input type="radio" id="starFor" name="update_rating" value="4" /><label for="starFor" title="Pretty good">4 stars</label>
                                                        <input type="radio" id="starThree" name="update_rating" value="3" /><label for="starThree" title="Meh">3 stars</label>
                                                        <input type="radio" id="starTwo" name="update_rating" value="2" /><label for="starTwo" title="Kinda bad">2 stars</label>
                                                        <input type="radio" id="starOne" name="update_rating" value="1" /><label for="starOne" title="Sucks big time">1 star</label>
                                                    </fieldset>
                                                    <div class="float-right mt-2">
                                                        <button type="button" class="btn btn-light cancel-btn"><b>Cancel</b></button>
                                                        <input type="submit" class="btn btn-learn" value="Update">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div>
                                    <div class="lesson-detail-title">Leave a Comment</div>
                                    <form action="{{ route('lesson_review.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <textarea name="content" cols="30" rows="5" class="form-control mb-3 w-100" required placeholder="Message"></textarea>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3 lesson-detail-title">Vote:</div>
                                                <input type="text" name="lesson_id" value="{{ $lesson->id }}" hidden>
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
                    <div class="course-info-text d-flex flex-wrap">
                        <i class="fas fa-hashtag"></i> Tags:
                        @foreach ($courseTags as $tag)
                            <form action="{{ route('tag.search', $tag->id) }}" class="mx-1 mt-n1 mb-1">
                                <label for="{{ $tag->id }}"><span class="badge badge-light badge-custom p-2 mt-2">{{ $tag->tag_title }}</span></label>
                                <input type="submit" hidden id="{{ $tag->id }}">
                            </form>
                        @endforeach
                    </div>
                </div>
                <div class="mt-3">
                    <div class="course-info-tittle d-flex justify-content-center align-items-center">Other Courses</div>
                    <div class="other-list">
                        @foreach($otherCourses as $key => $otherCourse)
                            <div class="other-list-item py-3 row mx-0">
                                <div class="col-1 no-gutters-custom ml-3 links-course">{{ ++$key }}</div>
                                <a href="{{ route('courses.show', $otherCourse->id) }}" class="col-10 no-gutters-custom links-course">{{ $otherCourse->title }}</a>
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
