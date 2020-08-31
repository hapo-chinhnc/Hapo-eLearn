<div class="hapolearn-title text-center w-100"><span class="hapolearn-title-borderbottom">Other Courses</span></div>
    <section class="hapolearn-othercourses mt-3 mt-md-5 d-md-flex flex-column flex-md-row justify-content-center">
        @foreach ($mainCourses->slice(3) as $course)
            <div class="card hapolearn-courses-items col-md-4 no-gutters-custom col-12">
                <img class="card-img-top img-fluid home-course-img" src="{{ asset('storage/images/css.jpg') }}">
                <div class="card-body no-gutters-custom hapolearn-card-body p-2">
                    <div class="card-title hapolearn-card-title pt-xl-2">{{ $course->title }}</div>
                    <div class="card-text hapolearn-card-text m-auto px-xl-4">{{ $course->description }}</div>
                    <a href="#" class="d-flex justify-content-center text-decoration-none mb-2"><button class="btn hapolearn-courses-btn mb-3 px-md-4 mt-xl-3 mb-xl-1">Take This Course</button></a>
                </div>
            </div>
        @endforeach
    </section>
    <div class="w-100 text-center mt-md-5"><a href="#" class="hapolearn-allcourses text-decoration-none">View All Our Courses<img src="{{ asset('storage/images/arrow.png') }}" class="ml-3"></a></div>
</main>
