<section class="container hapolearn-feedback no-gutters-custom mx-auto">
    <div class="d-flex flex-column mb-4">
        <div class="hapolearn-title text-center"><span class="hapolearn-title-borderbottom">Feedback</span></div>
        <div class="hapolearn-feedback-text col-10 text-center m-auto col-md-8 pt-3 px-md-0 col-xl-6">What other students turned professionals have to say about us after learning with us and reaching their goals</div>
    </div>
    <div class="hapolearn-slick slider slick-slider my-0 col-md-11 mx-auto">
        @foreach ($reviews as $review)
            <div class="hapolearn-slick-item">
                <div class="hapolearn-feedback-items border p-3 mt-2">
                    <span class="hapolearn-quote-borderleft"> “{{ $review->content }}”</span>
                </div>
                <div class="hapolearn-feedback-items-user mt-4 row ml-1">
                    <div class="hapolearn-feedback-items-user-picture">
                        <img src="{{ asset('storage/images/user-img.jpg') }}" class="user-avatar">
                    </div>
                    <div class="hapolearn-feedback-items-user-infor ml-3">
                        <p class="hapolearn-feedback-items-user-infor-text">{{ $review->user->name }}</p>
                        <p class="hapolearn-feedback-items-user-infor-courses">PHP</p>
                        @for ($i = 0; $i < $fullStar; $i++)
                            @if ($i < $review->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<input type="text" hidden value="<img src='{{ asset('storage/images/btn-left.png') }}' class='slide-btn-left'>" id="slide-btn-left">
<input type="text" hidden value="<img src='{{ asset('storage/images/btn-right.png') }}' class='slide-btn-right'>" id="slide-btn-right">
