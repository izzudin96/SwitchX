<div class="container">
    <div class="row">
        <div class="features">
            <div class="col-md-4">
                <img class="img-responsive feature-image" src="{{ $dashboard->feature1Image }}" alt="Generic placeholder image" width="230" height="230">

                <h2 class="feature-title">{{ $dashboard->feature1 }}</h2>

                <p class="feature-content">{{ $dashboard->feature1Description }}</p>
            </div>

            <div class="col-md-4">
                <img class="img-responsive feature-image" src="{{ $dashboard->feature2Image }}" alt="Generic placeholder image" width="230" height="230">

                <h2 class="feature-title">{{ $dashboard->feature2 }}</h2>

                <p class="feature-content">{{ $dashboard->feature2Description }}</p>
            </div>

            <div class="col-md-4">
                <img class="img-responsive feature-image" src="{{ $dashboard->feature3Image }}" alt="Generic placeholder image" width="230" height="230">

                <h2 class="feature-title">{{ $dashboard->feature3 }}</h2>

                <p class="feature-content">{{ $dashboard->feature3Description }}</p>
            </div>
        </div>
    </div>
</div>