@extends('layouts.weblayout')

@section('content')

<main>

```
<!-- =========================
     SERVICES HERO
========================== -->
<section class="page-hero services-hero"
         aria-labelledby="services-hero-title">

    <div class="container page-hero-inner">

        <div class="hero-copy fade-in">

            <span class="eyebrow">
                Our Services
            </span>

            <h1 id="services-hero-title">
                Powerful Solutions.<br>
                <span>Measurable Results.</span>
            </h1>

            <div class="hero-rule"></div>

            <p>
                From strategy to execution, we offer end-to-end digital
                marketing services that help your brand grow, connect,
                and convert.
            </p>

        </div>

<!-- HERO IMAGE -->
<div class="hero-art fade-in">

    <img src="{{ asset('web/assets/services-hero-art.png') }}"
         alt="Marketing dashboard with a rising growth chart surrounded by social and strategy symbols">

</div>
    </div>

</section>


<!-- =========================
     SERVICES / SOLUTIONS
========================== -->
<section class="solutions-section"
         aria-label="Digital growth solutions">

    <div class="container">

        <div class="service-orbit">


            <!-- =========================
                 CENTER
            ========================== -->
            <div class="orbit-center fade-in"
                 aria-label="360 degree digital growth solutions">

                <div class="orbit-ring"></div>

                <div class="orbit-core">

                    <strong>
                        360°
                    </strong>

                    <span>
                        Digital Growth<br>
                        Solutions
                    </span>

                </div>


                <span class="orbit-node"></span>
                <span class="orbit-node"></span>
                <span class="orbit-node"></span>
                <span class="orbit-node"></span>
                <span class="orbit-node"></span>
                <span class="orbit-node"></span>

            </div>


            <!-- =========================
                 DYNAMIC SERVICES
            ========================== -->

            @foreach($services as $service)

                @php

                    $number = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);

                    $position = $loop->iteration;

                    $side = $loop->iteration <= 3
                        ? 'left-card'
                        : 'right-card';

                    $icon = !empty($service->icon)
                        ? $service->icon
                        : 'fa-solid fa-circle';

                @endphp


                <article class="solution-card {{ $side }} solution-{{ $position }} fade-in"
                         id="service-{{ $service->id ?? $loop->iteration }}">


                    @if($loop->iteration <= 3)

                        <!-- LEFT SIDE -->

                        <div class="solution-copy">

                            <span class="solution-number">
                                {{ $number }}
                            </span>


                            <h3>
                                {{ $service->name }}
                            </h3>


                            <p>
                                {{ $service->description }}
                            </p>

                        </div>


                        <div class="solution-icon">

                            <i class="{{ $icon }}"
                               aria-hidden="true"></i>

                        </div>


                    @else

                        <!-- RIGHT SIDE -->

                        <div class="solution-icon">

                            <i class="{{ $icon }}"
                               aria-hidden="true"></i>

                        </div>


                        <div class="solution-copy">

                            <span class="solution-number">
                                {{ $number }}
                            </span>


                            <h3>
                                {{ $service->name }}
                            </h3>


                            <p>
                                {{ $service->description }}
                            </p>

                        </div>

                    @endif


                </article>

            @endforeach


        </div>

    </div>

</section>


<!-- =========================
     WHY IT WORKS
========================== -->
<section class="why-services-section"
         aria-labelledby="why-services-title">

    <div class="container">

        <div class="why-services-panel fade-in">

            <span class="section-kicker">
                Why It Works
            </span>


            <h2 id="why-services-title">

                We Don’t Just Deliver Services,

                <em>
                    We Drive Growth.
                </em>

            </h2>


            <div class="why-service-grid">


                <article class="why-service-item">

                    <i class="fa-solid fa-bullseye"
                       aria-hidden="true"></i>

                    <h3>
                        Strategic Approach
                    </h3>

                    <p>
                        Every service is backed by research,
                        insights & strategy.
                    </p>

                </article>


                <article class="why-service-item">

                    <i class="fa-solid fa-chart-column"
                       aria-hidden="true"></i>

                    <h3>
                        Result Focused
                    </h3>

                    <p>
                        We focus on what matters most —
                        measurable results.
                    </p>

                </article>


                <article class="why-service-item">

                    <i class="fa-solid fa-users"
                       aria-hidden="true"></i>

                    <h3>
                        Transparent Process
                    </h3>

                    <p>
                        Clear communication and complete
                        transparency at every step.
                    </p>

                </article>


                <article class="why-service-item">

                    <i class="fa-solid fa-award"
                       aria-hidden="true"></i>

                    <h3>
                        Experienced Team
                    </h3>

                    <p>
                        A passionate team of experts
                        committed to your success.
                    </p>

                </article>


            </div>

        </div>

    </div>

</section>


<!-- =========================
     OUR APPROACH
========================== -->
<section class="process-section"
         aria-labelledby="process-title">

    <div class="container">


        <div class="center-heading fade-in">

            <span class="section-kicker">
                Our Approach
            </span>

            <h2 class="page-heading"
                id="process-title">

                Simple. Strategic. Successful.

            </h2>

        </div>


        <div class="process-flow">


            <!-- DISCOVER -->
            <article class="process-step fade-in">

                <div class="process-icon">

                    <i class="fa-solid fa-magnifying-glass-chart"
                       aria-hidden="true"></i>

                </div>

                <h3>
                    Discover
                </h3>

                <p>
                    We understand your business,
                    audience & goals.
                </p>

            </article>


            <!-- PLAN -->
            <article class="process-step fade-in">

                <div class="process-icon">

                    <i class="fa-solid fa-person-chalkboard"
                       aria-hidden="true"></i>

                </div>

                <h3>
                    Plan
                </h3>

                <p>
                    We create a customized strategy
                    tailored to your needs.
                </p>

            </article>


            <!-- EXECUTE -->
            <article class="process-step fade-in">

                <div class="process-icon">

                    <i class="fa-solid fa-rocket"
                       aria-hidden="true"></i>

                </div>

                <h3>
                    Execute
                </h3>

                <p>
                    We bring the strategy to life
                    with precision and creativity.
                </p>

            </article>


            <!-- OPTIMIZE -->
            <article class="process-step fade-in">

                <div class="process-icon">

                    <i class="fa-solid fa-arrow-trend-up"
                       aria-hidden="true"></i>

                </div>

                <h3>
                    Optimize
                </h3>

                <p>
                    We analyze, optimize and improve
                    for better results.
                </p>

            </article>


            <!-- GROW -->
            <article class="process-step fade-in">

                <div class="process-icon">

                    <i class="fa-solid fa-trophy"
                       aria-hidden="true"></i>

                </div>

                <h3>
                    Grow
                </h3>

                <p>
                    We scale your growth and help you
                    achieve long-term success.
                </p>

            </article>


        </div>

    </div>

</section>
```

</main>

@endsection
