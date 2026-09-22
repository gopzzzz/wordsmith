@extends('layouts.weblayout')

@section('content')

<section class="hero" id="home">
    <div class="container hero-content">

        <div class="hero-text fade-in">
            <h2>
                {{ $banner->maintitle }}
            </h2>

            <p>
                {{ $banner->subtitle }}
            </p>
        </div>

        <div class="hero-image fade-in">
            <img src="{{ asset('uploads/' . $banner->bannerimage) }}"
                 alt="{{ $banner->maintitle }}">

            <div class="floating-icon icon-1">
                <i class="fas fa-bullseye"></i>
            </div>

            <div class="floating-icon icon-2">
                <i class="fas fa-chart-line"></i>
            </div>

            <div class="floating-icon icon-3">
                <i class="fas fa-user"></i>
            </div>
        </div>

    </div>
</section>


<!-- ================= PORTFOLIO ================= -->

<section class="portfolio" id="portfolio">
    <div class="container">

        <h3 class="section-title fade-in">
            Our <span class="text-accent">Work</span> Portfolio
        </h3>

        <div class="portfolio-grid">

            @foreach($portfolios as $portfolio)

                <div class="port-item fade-in">

                    <img src="{{ asset('uploads/' . $portfolio->image) }}"
                         alt="{{ $portfolio->name }}">

                    <div class="overlay">
                        <h4>{{ $portfolio->name }}</h4>
                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>


<!-- ================= ABOUT ================= -->

<section class="about" id="about">
    <div class="container about-content">

        <div class="about-image fade-in">

            <img src="{{ asset($homepage->about_image) }}"
                 alt="About Us">

            <div class="about-overlay-text">
                <h4>
                    Ideas<br>
                    Strategy<br>
                    <span class="text-accent">Impact</span>
                </h4>
            </div>

        </div>

        <div class="about-text fade-in">

            <h3 class="section-title text-left">
                About <span class="text-accent">Us</span>
            </h3>

            <p>
                {{ $homepage->aboutdescription }}
            </p>

        </div>

    </div>
</section>


<!-- ================= SERVICES ================= -->

<!-- ================= SERVICES ================= -->

<section class="services" id="services">
    <div class="container">

        <h3 class="section-title fade-in">
            Our <span class="text-accent">Services</span>
        </h3>

        <div class="services-grid">

            @foreach($services as $service)

                <div class="service-card fade-in">

                    <div class="icon">
                        <i class="{{ $service->icon }}"></i>
                    </div>

                    <h4>{{ $service->name }}</h4>

                    <p>
                        {{ $service->description }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>
</section>


<!-- ================= QUOTE BANNER ================= -->

<section class="quote-banner">
    <div class="container fade-in">

        <h2>
            <i class="fas fa-quote-left quote-icon-small"></i>

            Great Marketing Doesn't Just Get Attention,<br>
            It <span class="text-accent">Creates Connection.</span>

            <i class="fas fa-quote-right quote-icon-small"></i>
        </h2>

    </div>
</section>


<!-- ================= FEATURES ================= -->

<section class="features" id="why-us">
    <div class="container features-content">

        <div class="features-col left">

            <div class="feature-item fade-in"
                 style="transition-delay: 0.1s;">

                <div class="feat-text text-right">
                    <h4>Strategic Approach</h4>

                    <p>
                        We plan with purpose and execute with precision.
                    </p>
                </div>

                <div class="feat-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>

            </div>


            <div class="feature-item fade-in"
                 style="transition-delay: 0.2s;">

                <div class="feat-text text-right">
                    <h4>Creative Excellence</h4>

                    <p>
                        Ideas that stand out and deliver real impact.
                    </p>
                </div>

                <div class="feat-icon">
                    <i class="fas fa-camera"></i>
                </div>

            </div>


            <div class="feature-item fade-in"
                 style="transition-delay: 0.3s;">

                <div class="feat-text text-right">
                    <h4>Data-Driven Results</h4>

                    <p>
                        We analyze, optimize and deliver measurable growth.
                    </p>
                </div>

                <div class="feat-icon">
                    <i class="fas fa-cogs"></i>
                </div>

            </div>

        </div>


        <div class="features-center fade-in">

            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80"
                 alt="Creative Mind">

        </div>


        <div class="features-col right">

            <div class="feature-item fade-in"
                 style="transition-delay: 0.1s;">

                <div class="feat-icon">
                    <i class="fas fa-user-check"></i>
                </div>

                <div class="feat-text text-left">
                    <h4>Client-Centric</h4>

                    <p>
                        Your goals are our priority, always.
                    </p>
                </div>

            </div>


            <div class="feature-item fade-in"
                 style="transition-delay: 0.2s;">

                <div class="feat-icon">
                    <i class="fas fa-comments"></i>
                </div>

                <div class="feat-text text-left">
                    <h4>Transparent Process</h4>

                    <p>
                        Clear communication and honest reporting.
                    </p>
                </div>

            </div>


            <div class="feature-item fade-in"
                 style="transition-delay: 0.3s;">

                <div class="feat-icon">
                    <i class="fas fa-users"></i>
                </div>

                <div class="feat-text text-left">
                    <h4>Passionate Team</h4>

                    <p>
                        A dedicated team that cares about your success.
                    </p>
                </div>

            </div>

        </div>

    </div>
</section>


<!-- ================= INSPIRE ================= -->

<section class="inspire">
    <div class="container">

        <div class="inspire-content fade-in">

            <i class="fas fa-quote-left bg-quote"></i>

            <h2>
                Marketing is no longer about the stuff you make,<br>
                but the <span class="text-accent">stories you tell.</span>
            </h2>

            <p>- Seth Godin</p>

            <i class="fas fa-quote-right bg-quote-right"></i>

        </div>

    </div>
</section>


<!-- ================= WHY MARKETING ================= -->

<section class="why-marketing">

    <div class="container why-content">

        <div class="why-title fade-in">

            <h3>
                Why Marketing<br>
                <span class="text-accent-underline">Matters?</span>
            </h3>

        </div>


        <div class="why-list fade-in"
             style="transition-delay: 0.2s;">

            <ul>

                <li>
                    <i class="fas fa-check-circle"></i>
                    It builds brand awareness and credibility.
                </li>

                <li>
                    <i class="fas fa-check-circle"></i>
                    It connects you with the right audience.
                </li>

                <li>
                    <i class="fas fa-check-circle"></i>
                    It drives engagement and customer loyalty.
                </li>

                <li>
                    <i class="fas fa-check-circle"></i>
                    It converts interest into sales.
                </li>

                <li>
                    <i class="fas fa-check-circle"></i>
                    It fuels business growth and long-term success.
                </li>

            </ul>

        </div>


        <div class="why-image fade-in"
             style="transition-delay: 0.4s;">

            <i class="fas fa-bullseye huge-icon"></i>

        </div>

    </div>

</section>


<!-- ================= TESTIMONIALS ================= -->

<!-- ================= TESTIMONIALS ================= -->

<section class="testimonials" id="testimonials">

    <div class="container">

        <h3 class="section-title fade-in">
            What Our <span class="text-accent">Clients</span> Say
        </h3>

        <div class="test-grid">

            @foreach($testimonials as $testimonial)

                <div class="test-card fade-in">

                    <i class="fas fa-quote-left test-quote text-accent"></i>

                    <p class="review">
                        {{ $testimonial->description }}
                    </p>

                    <div class="client-info">

                        <img src="{{ asset($testimonial->image) }}"
                             alt="{{ $testimonial->name }}">

                        <div>

                            <h4>{{ $testimonial->name }}</h4>

                            <span>
                                {{ $testimonial->occupations }}
                            </span>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- ================= CTA ================= -->

<section class="cta-section" id="contact">

    <div class="container">

        <div class="cta-box fade-in">

            <h2>
                Let's Build Something<br>
                <span class="text-accent">Amazing</span> Together.
            </h2>

        </div>

    </div>

</section>


@endsection