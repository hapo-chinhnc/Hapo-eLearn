<main class="container no-gutters-custom m-auto px-3 px-md-0">
    <section class="hapolearn-courses d-md-flex flex-column flex-md-row justify-content-center">
        @foreach ($mainCourses->slice(0, 3) as $course)
            <div class="card hapolearn-courses-items col-md-4 no-gutters-custom col-12">
                <img class="card-img-top img-fluid home-course-img" src="{{ asset('storage/images/HTMLCSS.jpg') }}">
                <div class="card-body no-gutters-custom hapolearn-card-body p-2">
                    <div class="card-title hapolearn-card-title pt-xl-3">{{ $course->title }}</div>
                    <div class="card-text hapolearn-card-text m-auto px-xl-4">{{ $course->description }}</div>
                    <a href="{{ route('courses.show', $course->id) }}" class="d-flex justify-content-center text-decoration-none"><button class="btn hapolearn-courses-btn mb-3 m-md-0 px-md-4 mt-xl-3 mb-xl-1">Take This Course</button></a>
                </div>
            </div>
        @endforeach
    </section>
