<section class="container hapolearn-statistic">
    <div class="hapolearn-title text-center mt-5"><span class="hapolearn-title-borderbottom">Statistic</span></div>
    <div class="row d-flex flex-md-row justify-content-md-around flex-column mt-3">
        <div class="text-center">
            <p class="hapolearn-statistic-title">Courses</p>
            <p class="hapolearn-statistic-number">{{ $statistic['courses'] }}</p>
        </div>
        <div class="text-center">
            <p class="hapolearn-statistic-title">Lessons</p>
            <p class="hapolearn-statistic-number">{{ $statistic['lessons'] }}</p>
        </div>
        <div class="text-center">
            <p class="hapolearn-statistic-title">Learners</p>
            <p class="hapolearn-statistic-number">{{ $statistic['learner'] }}</p>
        </div>
    </div>
</section>
