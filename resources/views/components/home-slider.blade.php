<div class="carousel slide" id="homeCarousel" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button class="active" data-bs-target="#homeCarousel" data-bs-slide-to="0" type="button"
            aria-current="true"></button>
        <button data-bs-target="#homeCarousel" data-bs-slide-to="1" type="button"></button>
        <button data-bs-target="#homeCarousel" data-bs-slide-to="2" type="button"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('asstes/slides/slide1.jpg') }}" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Umaya Shop BD</h5>
                <p>Best products at the best price!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('asstes/slides/slide2.jpg') }}" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Exclusive Collections</h5>
                <p>Check out our latest arrivals</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('asstes/slides/slide3.jpg') }}" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Fast Delivery</h5>
                <p>We deliver all over Bangladesh</p>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" data-bs-target="#homeCarousel" data-bs-slide="prev" type="button">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" data-bs-target="#homeCarousel" data-bs-slide="next" type="button">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
