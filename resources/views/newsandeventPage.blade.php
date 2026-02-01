<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>San Agustin E-Services</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/newsandeventPage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>

<body>
    @include('navbar')
    <section class="page-header">
        <div class="page-header-overlay">
            <div class="page-header-content">
                <h1>News & Events</h1>
            </div>
        </div>
    </section>


    <div class="container news-events-container">
        <div class="search-wrapper">
            <div class="search-box">
                <span class="search-icon"><img src="{{asset('icons/search.png')}}" alt="" style="width: 27px;"></span>
                <input type="text" class="search-input" placeholder="Search news and events...">
            </div>
        </div>



        <div class="filter-tabs">
            <button class="filter-tab active" data-filter="all">All News & Events</button>
            <button class="filter-tab" data-filter="news">News</button>
            <button class="filter-tab" data-filter="events">Events</button>
        </div>


        <div class="news-grid">

            <div class="news-card">
                <div class="news-card-image">
                    <img src="{{ asset('images/kasal.jpg') }}" alt="News Event">
                </div>
                <div class="news-card-content">
                    <h3 class="news-card-title">Kasalang Bayan</h3>
                    <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                    <div class="news-card-footer">
                        <span class="news-card-date">1/21/2026</span>
                        <a href="#" class="news-card-link">Read More &#10095;</a>
                    </div>
                </div>
            </div>


            <div class="news-card">
                <div class="news-card-image">
                    <img src="{{ asset('images/giftgiving.png') }}" alt="News Event">
                </div>
                <div class="news-card-content">
                    <h3 class="news-card-title">Gift Giving</h3>
                    <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                    <div class="news-card-footer">
                        <span class="news-card-date">1/21/2026</span>
                        <a href="#" class="news-card-link">Read More &#10095;</a>
                    </div>
                </div>
            </div>


            <div class="news-card">
                <div class="news-card-image">
                    <img src="{{ asset('images/feeding.png') }}" alt="News Event">
                </div>
                <div class="news-card-content">
                    <h3 class="news-card-title">Feeding Program</h3>
                    <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                    <div class="news-card-footer">
                        <span class="news-card-date">1/21/2026</span>
                        <a href="#" class="news-card-link">Read More &#10095;</a>
                    </div>
                </div>
            </div>

            <div class="news-card">
                <div class="news-card-image">
                    <img src="{{ asset('images/skillstraining.jpg') }}" alt="News Event">
                </div>
                <div class="news-card-content">
                    <h3 class="news-card-title">Skills Training/Workshops</h3>
                    <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                    <div class="news-card-footer">
                        <span class="news-card-date">1/21/2026</span>
                        <a href="#" class="news-card-link">Read More &#10095;</a>
                    </div>
                </div>
            </div>


            <div class="news-card">
                <div class="news-card-image">
                    <img src="{{ asset('images/tutor.jpg') }}" alt="News Event">
                </div>
                <div class="news-card-content">
                    <h3 class="news-card-title">Volunteer Tutors Program</h3>
                    <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                    <div class="news-card-footer">
                        <span class="news-card-date">1/21/2026</span>
                        <a href="#" class="news-card-link">Read More &#10095;</a>
                    </div>
                </div>
            </div>


            <div class="news-card">
                <div class="news-card-image">
                    <img src="{{ asset('images/fiesta.jpg') }}" alt="News Event">
                </div>
                <div class="news-card-content">
                    <h3 class="news-card-title">Barangay Fiesta</h3>
                    <p class="news-card-description">Ante montes accumsan pulvinar metus. Maecenas erat cubilia justo conubia fames sagittis. Natoque ipsum nec ut. Class adipiscing congue id malesuada hendrerit cras taciti arcu?</p>
                    <div class="news-card-footer">
                        <span class="news-card-date">1/21/2026</span>
                        <a href="#" class="news-card-link">Read More &#10095;</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="load-more-wrapper">
            <button class="load-more-btn">Load More</button>
        </div>
    </div>


    @include('scrollToTop')
    @include('footer')

</body>

<script>
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

</html>