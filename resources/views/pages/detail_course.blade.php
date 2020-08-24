@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="course-detail-image d-flex justify-content-center col-7">
                <img src="{{ asset('storage/images/HTMLCSS.png') }}" class="img-fluid p-5">
            </div>
            <div class="ml-1 descriptions-course p-3 col-4 ml-5">
                <div class="descriptions-course-title">Descriptions course</div>
                <div class="descriptions-course-content">Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique fringilla tempus. Vivamus bibendum nibh in dolor pharetra, a euismod nulla dignissim. Aenean viverra tincidunt nibh, in imperdiet nunc. Suspendisse eu ante pretium,
                     consectetur leo at, congue quam. Nullam hendrerit porta ante vitae tristique.
                </div>
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
                        <?php $n = 15 ?>
                        <div class="course-detail-lesson-detail">
                            @for ($i = 0; $i < $n; $i++)
                                <div class="d-flex justify-content-between align-items-center p-3 border-top-bot">
                                    <p class="my-auto"><strong>{{ $i+1 }}:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <button class="btn btn-learn">Learn</button>
                                </div>
                            @endfor
                            <div class="mt-4">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                                  </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 course-info h-50 ml-5 w-100 px-0">
                <div class="course-info-text">
                    <i class="fas fa-users"></i> Learners: 500
                </div>
                <div class="course-info-text">
                    <i class="far fa-list-alt"></i> Lessons: 100 lessons
                </div>
                <div class="course-info-text">
                    <i class="far fa-clock"></i> Times: 80 hours
                </div>
                <div class="course-info-text">
                    <i class="fas fa-hashtag"></i> Tags: #tag1 #tag2
                </div>
                <div class="course-info-text">
                    <i class="far fa-money-bill-alt"></i> Price: Free
                </div>
                <div class="mt-3">
                    <div class="course-info-tittle d-flex justify-content-center align-items-center">Other Courses</div>
                    <div class="other-list">
                        <?php $count=6 ?>
                        @for ($i = 0; $i < $count; $i++)
                            <div class="other-list-item py-3 row mx-0 ">
                              <div class="col-1 no-gutters-custom ml-3"><strong>{{ $i+1 }}</strong></div>
                              <div class="col-10 no-gutters-custom">Lorem ipsum dolor sit amet, consectetur the adipiscing elit.</div>
                            </div>
                        @endfor
                        <div class="text-center p-4">
                            <button class="btn btn-learn p-2 px-4">View all ours courses</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
