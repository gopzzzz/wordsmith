 
@extends('layouts.weblayout')

@section('content')

 <main>
        <section class="page-hero about-hero" aria-labelledby="about-hero-title">
            <div class="container page-hero-inner">
                <div class="hero-copy fade-in">
                    <span class="eyebrow">About Us</span>
                    <h1 id="about-hero-title">We Create. We Strategize.<br><span>We Deliver Results.</span></h1>
                    <div class="hero-rule"></div>
                    <p>We're more than a marketing agency.<br>We're your growth partners in the digital world.</p>
                </div>
                <div class="hero-art fade-in">
                    <img src="assets/about-hero-art.png" alt="Laptop showing brand growth analytics surrounded by strategy and communication symbols">
                </div>
            </div>
        </section>

        <section class="about-story-section" aria-labelledby="who-we-are-title">
            <div class="container about-story-grid">
                <div class="story-image-wrap fade-in">
                    <img src="assets/about-team.png" alt="WordsmithABC strategy team collaborating around a table">
                </div>
                <div class="about-story-copy fade-in">
                    <span class="section-kicker">Who We Are</span>
                    <h2 class="page-heading" id="who-we-are-title">Building Brands.<br>Driving Growth.</h2>
                    <p>At WordsmithABC, we blend creativity with strategy to help businesses grow, stand out, and succeed online. From startups to established brands, we create digital experiences that connect, engage, and deliver real results.</p>
                    <div class="story-pillars" aria-label="Our strengths">
                        <div class="story-pillar"><i class="fa-solid fa-bullseye" aria-hidden="true"></i><span>Results<br>Driven</span></div>
                        <div class="story-pillar"><i class="fa-regular fa-lightbulb" aria-hidden="true"></i><span>Creative<br>Thinking</span></div>
                        <div class="story-pillar"><i class="fa-solid fa-user-group" aria-hidden="true"></i><span>Client<br>Focused</span></div>
                        <div class="story-pillar"><i class="fa-solid fa-chart-column" aria-hidden="true"></i><span>Growth<br>Oriented</span></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="direction-section" aria-labelledby="direction-title">
            <div class="container">
                <div class="center-heading fade-in">
                    <span class="section-kicker">Our Direction</span>
                    <h2 class="page-heading" id="direction-title">Our Vision &amp; Mission</h2>
                    <div class="heading-rule"></div>
                </div>
                <div class="direction-grid">
                    <article class="direction-card fade-in">
                        <div class="direction-icon"><i class="fa-regular fa-eye" aria-hidden="true"></i></div>
                        <h3>Our Vision</h3>
                        <p>To be a leading digital marketing agency recognized for our creativity, integrity, and measurable impact.</p>
                    </article>
                    <article class="direction-card fade-in">
                        <div class="direction-icon"><i class="fa-regular fa-flag" aria-hidden="true"></i></div>
                        <h3>Our Mission</h3>
                        <p>To empower businesses with smart digital strategies and innovative solutions that drive growth and long-term success.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="values-section" aria-labelledby="values-title">
            <div class="container">
                <div class="center-heading fade-in">
                    <span class="section-kicker">Our Values</span>
                    <h2 class="page-heading" id="values-title">What Drives Us</h2>
                </div>
                <div class="values-grid">
                    <article class="value-item fade-in">
                        <div class="value-icon"><i class="fa-solid fa-heart" aria-hidden="true"></i></div>
                        <h3>Integrity</h3>
                        <p>We believe in honesty, transparency and building trust.</p>
                    </article>
                    <article class="value-item fade-in">
                        <div class="value-icon"><i class="fa-regular fa-lightbulb" aria-hidden="true"></i></div>
                        <h3>Creativity</h3>
                        <p>Original ideas and innovative thinking power everything we do.</p>
                    </article>
                    <article class="value-item fade-in">
                        <div class="value-icon"><i class="fa-solid fa-user" aria-hidden="true"></i></div>
                        <h3>Excellence</h3>
                        <p>We are committed to quality, continuous improvement and great results.</p>
                    </article>
                    <article class="value-item fade-in">
                        <div class="value-icon"><i class="fa-solid fa-handshake" aria-hidden="true"></i></div>
                        <h3>Collaboration</h3>
                        <p>We work as an extension of your team to achieve shared success.</p>
                    </article>
                    <article class="value-item fade-in">
                        <div class="value-icon"><i class="fa-solid fa-chart-line" aria-hidden="true"></i></div>
                        <h3>Growth</h3>
                        <p>We are passionate about driving growth for our clients and ourselves.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="founder-section" aria-labelledby="founder-quote-title">
            <div class="container founder-grid">
                <div class="founder-image fade-in">
                    <img src="assets/about-founder.png" alt="Founder of WordsmithABC">
                </div>
                <div class="founder-quote fade-in">
                    <span class="section-kicker">Founder's Quote</span>
                    <div class="quote-line">
                        <span class="quote-mark" aria-hidden="true">“</span>
                        <blockquote id="founder-quote-title">Our goal is simple — to help businesses tell their story, reach the right audience, and grow beyond limits.</blockquote>
                        <span class="quote-mark closing" aria-hidden="true">“</span>
                    </div>
                    <cite>– Founder, WordsmithABC</cite>
                </div>
            </div>
        </section>

        <section class="build-cta" aria-labelledby="about-cta-title">
            <div class="container build-cta-inner fade-in">
                <div class="cta-plane"><i class="fa-regular fa-paper-plane" aria-hidden="true"></i></div>
                <div>
                    <h2 id="about-cta-title">Let's Build Something <span>Great</span> Together.</h2>
                    <p>We're ready when you are.</p>
                </div>
            </div>
        </section>
    </main>
@endsection