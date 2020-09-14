<section class="hapolearn-banner-member">
    <div class="wrap text-center">
        <div class="hapolearn-banner-member-title">Become a member of our<br> growing community!</div>
        @if (Auth::check())
            <a href="{{ route('courses.index') }}"><button class="hapolearn-banner-member-button px-md-5 py-md-3 px-4 py-2">Start Learning Now!</button></a>
        @else
            <button class="hapolearn-banner-member-button px-md-5 py-md-3 px-4 py-2" data-toggle="modal" data-target="#loginRegister">Become our Member!</button>
        @endif
    </div>
</section>
