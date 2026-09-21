  
@extends('layouts.weblayout')

@section('content')

 
 <main>
        <section class="page-hero services-hero" aria-labelledby="services-hero-title">
            <div class="container page-hero-inner">
                <div class="hero-copy fade-in">
                    <span class="eyebrow">Our Services</span>
                    <h1 id="services-hero-title">Powerful Solutions.<br><span>Measurable Results.</span></h1>
                    <div class="hero-rule"></div>
                    <p>From strategy to execution, we offer end-to-end digital marketing services that help your brand grow, connect, and convert.</p>
                </div>
                <div class="hero-art fade-in">
                    <img src="assets/services-hero-art.png" alt="Marketing dashboard with a rising growth chart surrounded by social and strategy symbols">
                </div>
            </div>
        </section>

        <section class="solutions-section" aria-label="Digital growth solutions">
            <div class="container">
                <div class="service-orbit">
                    <div class="orbit-center fade-in" aria-label="360 degree digital growth solutions">
                        <div class="orbit-ring"></div>
                        <div class="orbit-core"><strong>360°</strong><span>Digital Growth<br>Solutions</span></div>
                        <span class="orbit-node"></span>
                        <span class="orbit-node"></span>
                        <span class="orbit-node"></span>
                        <span class="orbit-node"></span>
                        <span class="orbit-node"></span>
                        <span class="orbit-node"></span>
                    </div>

                    <article class="solution-card left-card solution-1 fade-in" id="digital-strategy">
                        <div class="solution-copy">
                            <span class="solution-number">01</span>
                            <h3>Digital Strategy</h3>
                            <p>Data-driven strategies tailored to your business goals and market opportunities.</p>
                        </div>
                        <div class="solution-icon"><i class="fa-solid fa-chess-knight" aria-hidden="true"></i></div>
                    </article>

                    <article class="solution-card left-card solution-2 fade-in" id="social-media">
                        <div class="solution-copy">
                            <span class="solution-number">02</span>
                            <h3>Social Media<br>Management</h3>
                            <p>We create, manage &amp; grow your social presence across platforms that matter.</p>
                        </div>
                        <div class="solution-icon"><i class="fa-regular fa-thumbs-up" aria-hidden="true"></i></div>
                    </article>

                    <article class="solution-card left-card solution-3 fade-in" id="content-creation">
                        <div class="solution-copy">
                            <span class="solution-number">03</span>
                            <h3>Content Creation</h3>
                            <p>Engaging content that tells your brand story and connects with your audience.</p>
                        </div>
                        <div class="solution-icon"><i class="fa-solid fa-pen-ruler" aria-hidden="true"></i></div>
                    </article>

                    <article class="solution-card right-card solution-4 fade-in" id="seo-services">
                        <div class="solution-icon"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></div>
                        <div class="solution-copy">
                            <span class="solution-number">04</span>
                            <h3>SEO Services</h3>
                            <p>Improve your rankings, drive organic traffic and get found by the right audience.</p>
                        </div>
                    </article>

                    <article class="solution-card right-card solution-5 fade-in" id="web-design">
                        <div class="solution-icon"><i class="fa-solid fa-desktop" aria-hidden="true"></i></div>
                        <div class="solution-copy">
                            <span class="solution-number">05</span>
                            <h3>Web Design &amp;<br>Development</h3>
                            <p>Beautiful, responsive websites designed to engage users and convert visitors.</p>
                        </div>
                    </article>

                    <article class="solution-card right-card solution-6 fade-in" id="branding">
                        <div class="solution-icon"><i class="fa-regular fa-gem" aria-hidden="true"></i></div>
                        <div class="solution-copy">
                            <span class="solution-number">06</span>
                            <h3>Branding &amp; Identity</h3>
                            <p>Build a strong, memorable brand identity that sets you apart from the competition.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="why-services-section" aria-labelledby="why-services-title">
            <div class="container">
                <div class="why-services-panel fade-in">
                    <span class="section-kicker">Why It Works</span>
                    <h2 id="why-services-title">We Don’t Just Deliver Services,<em>We Drive Growth.</em></h2>
                    <div class="why-service-grid">
                        <article class="why-service-item">
                            <i class="fa-solid fa-bullseye" aria-hidden="true"></i>
                            <h3>Strategic Approach</h3>
                            <p>Every service is backed by research, insights &amp; strategy.</p>
                        </article>
                        <article class="why-service-item">
                            <i class="fa-solid fa-chart-column" aria-hidden="true"></i>
                            <h3>Result Focused</h3>
                            <p>We focus on what matters most — measurable results.</p>
                        </article>
                        <article class="why-service-item">
                            <i class="fa-solid fa-users" aria-hidden="true"></i>
                            <h3>Transparent Process</h3>
                            <p>Clear communication and complete transparency at every step.</p>
                        </article>
                        <article class="why-service-item">
                            <i class="fa-solid fa-award" aria-hidden="true"></i>
                            <h3>Experienced Team</h3>
                            <p>A passionate team of experts committed to your success.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="process-section" aria-labelledby="process-title">
            <div class="container">
                <div class="center-heading fade-in">
                    <span class="section-kicker">Our Approach</span>
                    <h2 class="page-heading" id="process-title">Simple. Strategic. Successful.</h2>
                </div>
                <div class="process-flow">
                    <article class="process-step fade-in">
                        <div class="process-icon"><i class="fa-solid fa-magnifying-glass-chart" aria-hidden="true"></i></div>
                        <h3>Discover</h3>
                        <p>We understand your business, audience &amp; goals.</p>
                    </article>
                    <article class="process-step fade-in">
                        <div class="process-icon"><i class="fa-solid fa-person-chalkboard" aria-hidden="true"></i></div>
                        <h3>Plan</h3>
                        <p>We create a customized strategy tailored to your needs.</p>
                    </article>
                    <article class="process-step fade-in">
                        <div class="process-icon"><i class="fa-solid fa-rocket" aria-hidden="true"></i></div>
                        <h3>Execute</h3>
                        <p>We bring the strategy to life with precision and creativity.</p>
                    </article>
                    <article class="process-step fade-in">
                        <div class="process-icon"><i class="fa-solid fa-arrow-trend-up" aria-hidden="true"></i></div>
                        <h3>Optimize</h3>
                        <p>We analyze, optimize and improve for better results.</p>
                    </article>
                    <article class="process-step fade-in">
                        <div class="process-icon"><i class="fa-solid fa-trophy" aria-hidden="true"></i></div>
                        <h3>Grow</h3>
                        <p>We scale your growth and help you achieve long-term success.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="growth-cta" aria-labelledby="services-cta-title">
            <div class="container growth-cta-inner fade-in">
                <div>
                    <h2 id="services-cta-title">Ready to <span>Grow Your Brand?</span></h2>
                    <p>Let's create something amazing together.</p>
                </div>
                <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
            </div>
        </section>
    </main>

    @endsection