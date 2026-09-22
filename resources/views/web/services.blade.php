@extends('layouts.weblayout')

@section('content')

<main>

    <!-- =========================
         SERVICES HERO
    ========================== -->
    <section class="page-hero" aria-labelledby="services-title">

        <div class="container page-hero-inner">

            <div class="hero-copy fade-in">

                <span class="eyebrow">
                    Our Services
                </span>

                <h1 id="services-title">
                    What We <span>Do</span>
                </h1>

                <div class="hero-rule"></div>

                <p>
                    We provide creative and strategic digital solutions
                    to help your business grow.
                </p>

            </div>

        </div>

    </section>


    <!-- =========================
         SERVICES
    ========================== -->
    <section class="services" id="services">

        <div class="container">

            <h2 class="section-title fade-in">
                Our <span class="text-accent">Services</span>
            </h2>


            <div class="services-grid">

                @foreach($services as $service)

                    <div class="service-card fade-in">

                        <!-- Icon -->
                        <div class="icon">

                            <i class="{{ $service->icon }}"></i>

                        </div>


                        <!-- Service Name -->
                        <h4>
                            {{ $service->name }}
                        </h4>


                        <!-- Service Description -->
                        <p>
                            {{ $service->description }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

</main>

@endsection