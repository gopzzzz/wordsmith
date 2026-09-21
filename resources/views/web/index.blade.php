 @extends('layouts.weblayout')

@section('content')

 
 <section class="hero" id="home">
        <div class="container hero-content">
            <div class="hero-text fade-in">
                <h2>We Don't Just Market,<br>We <span class="text-accent">Make an Impact.</span></h2>
                <p>Strategic marketing solutions that help brands grow, connect and lead.</p>
            </div>
            <div class="hero-image fade-in">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80" alt="Marketing Impact">
                <div class="floating-icon icon-1"><i class="fas fa-bullseye"></i></div>
                <div class="floating-icon icon-2"><i class="fas fa-chart-line"></i></div>
                <div class="floating-icon icon-3"><i class="fas fa-user"></i></div>
            </div>
        </div>
    </section>

    <section class="portfolio" id="portfolio">
        <div class="container">
            <h3 class="section-title fade-in">Our <span class="text-accent">Work</span> Portfolio</h3>
            
            <div class="portfolio-grid">
                <div class="port-item item-1 fade-in">
                    <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=400&q=80" alt="Social Media Campaign">
                    <div class="overlay">
                        <h4>Social Media<br>Campaign</h4>
                    </div>
                </div>
                
                <div class="port-item item-2 fade-in">
                    <img src="https://images.unsplash.com/photo-1523362628745-0c100150b504?auto=format&fit=crop&w=800&q=80" alt="Aqua Pure">
                    <div class="overlay">
                        <h4>Drink Pure</h4>
                    </div>
                </div>
                
                <div class="port-item item-3 fade-in">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=400&q=80" alt="Rise Together">
                    <div class="overlay">
                        <h4>Rise<br><span class="text-accent">Together</span></h4>
                    </div>
                </div>
                
                <div class="port-item item-4 fade-in">
                    <img src="https://images.unsplash.com/photo-1528819622765-d6bcf132f793?auto=format&fit=crop&w=400&q=80" alt="Build Your Brand">
                    <div class="overlay">
                        <h4>Build Your<br>Brand</h4>
                    </div>
                </div>
                
                <div class="port-item item-5 fade-in">
                    <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?auto=format&fit=crop&w=400&q=80" alt="Innovative Solutions">
                    <div class="overlay">
                        <h4>Innovative<br>Solutions</h4>
                    </div>
                </div>
                
                <div class="port-item item-6 fade-in">
                    <img src="https://images.unsplash.com/photo-1459156212016-c812468e2115?auto=format&fit=crop&w=400&q=80" alt="Fresh Look">
                    <div class="overlay">
                        <h4>Fresh Look.<br>Stronger Presence.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container about-content">
            <div class="about-image fade-in">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80" alt="Modern Office">
                <div class="about-overlay-text">
                    <h4>Ideas<br>Strategy<br><span class="text-accent">Impact</span></h4>
                </div>
            </div>
            <div class="about-text fade-in">
                <h3 class="section-title text-left">About <span class="text-accent">Us</span></h3>
                <p>At WordsmithABC, we're more than a marketing agency - we're your growth partners. We blend creativity, strategy, and data to build powerful brand identities and drive measurable results.</p>
                <p>From startups to established brands, we help businesses stand out, connect with the right audience, and achieve sustainable growth.</p>
            </div>
        </div>
    </section>

    <section class="services" id="services">
        <div class="container">
            <h3 class="section-title fade-in">Our <span class="text-accent">Services</span></h3>
            <div class="services-grid">
                <div class="service-card fade-in" style="transition-delay: 0.1s;">
                    <div class="icon"><i class="fas fa-bullhorn"></i></div>
                    <h4>Digital Marketing</h4>
                    <p>Data-driven strategies to boost your online presence and reach the right audience.</p>
                </div>
                <div class="service-card fade-in" style="transition-delay: 0.2s;">
                    <div class="icon"><i class="fas fa-pen-nib"></i></div>
                    <h4>Branding</h4>
                    <p>Build a strong, unique brand identity that creates lasting impressions.</p>
                </div>
                <div class="service-card fade-in" style="transition-delay: 0.3s;">
                    <div class="icon"><i class="fas fa-file-alt"></i></div>
                    <h4>Content Creation</h4>
                    <p>Engaging content that tells your story and connects with your audience.</p>
                </div>
                <div class="service-card fade-in" style="transition-delay: 0.4s;">
                    <div class="icon"><i class="fas fa-vector-square"></i></div>
                    <h4>Graphic Design</h4>
                    <p>Creative designs that communicate your brand's message visually.</p>
                </div>
                <div class="service-card fade-in" style="transition-delay: 0.5s;">
                    <div class="icon"><i class="fas fa-chart-pie"></i></div>
                    <h4>Social Media Management</h4>
                    <p>Strategic social media management to grow engagement and brand loyalty.</p>
                </div>
                <div class="service-card fade-in" style="transition-delay: 0.6s;">
                    <div class="icon"><i class="fas fa-search-dollar"></i></div>
                    <h4>SEO & Analytics</h4>
                    <p>Improve rankings, drive traffic and measure performance that matters.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="quote-banner">
        <div class="container fade-in">
            <h2><i class="fas fa-quote-left quote-icon-small"></i> Great Marketing Doesn't Just Get Attention,<br>It <span class="text-accent">Creates Connection.</span> <i class="fas fa-quote-right quote-icon-small"></i></h2>
        </div>
    </section>

    <section class="features" id="why-us">
        <div class="container features-content">
            <div class="features-col left">
                <div class="feature-item fade-in" style="transition-delay: 0.1s;">
                    <div class="feat-text text-right">
                        <h4>Strategic Approach</h4>
                        <p>We plan with purpose and execute with precision.</p>
                    </div>
                    <div class="feat-icon"><i class="fas fa-clipboard-list"></i></div>
                </div>
                <div class="feature-item fade-in" style="transition-delay: 0.2s;">
                    <div class="feat-text text-right">
                        <h4>Creative Excellence</h4>
                        <p>Ideas that stand out and deliver real impact.</p>
                    </div>
                    <div class="feat-icon"><i class="fas fa-camera"></i></div>
                </div>
                <div class="feature-item fade-in" style="transition-delay: 0.3s;">
                    <div class="feat-text text-right">
                        <h4>Data-Driven Results</h4>
                        <p>We analyze, optimize and deliver measurable growth.</p>
                    </div>
                    <div class="feat-icon"><i class="fas fa-cogs"></i></div>
                </div>
            </div>
            
            <div class="features-center fade-in">
                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80" alt="Creative Mind">
            </div>
            
            <div class="features-col right">
                <div class="feature-item fade-in" style="transition-delay: 0.1s;">
                    <div class="feat-icon"><i class="fas fa-user-check"></i></div>
                    <div class="feat-text text-left">
                        <h4>Client-Centric</h4>
                        <p>Your goals are our priority, always.</p>
                    </div>
                </div>
                <div class="feature-item fade-in" style="transition-delay: 0.2s;">
                    <div class="feat-icon"><i class="fas fa-comments"></i></div>
                    <div class="feat-text text-left">
                        <h4>Transparent Process</h4>
                        <p>Clear communication and honest reporting.</p>
                    </div>
                </div>
                <div class="feature-item fade-in" style="transition-delay: 0.3s;">
                    <div class="feat-icon"><i class="fas fa-users"></i></div>
                    <div class="feat-text text-left">
                        <h4>Passionate Team</h4>
                        <p>A dedicated team that cares about your success.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="inspire">
        <div class="container">
            <div class="inspire-content fade-in">
                <i class="fas fa-quote-left bg-quote"></i>
                <h2>Marketing is no longer about the stuff you make,<br>but the <span class="text-accent">stories you tell.</span></h2>
                <p>- Seth Godin</p>
                <i class="fas fa-quote-right bg-quote-right"></i>
            </div>
        </div>
    </section>

    <section class="why-marketing">
        <div class="container why-content">
            <div class="why-title fade-in">
                <h3>Why Marketing<br><span class="text-accent-underline">Matters?</span></h3>
            </div>
            <div class="why-list fade-in" style="transition-delay: 0.2s;">
                <ul>
                    <li><i class="fas fa-check-circle"></i> It builds brand awareness and credibility.</li>
                    <li><i class="fas fa-check-circle"></i> It connects you with the right audience.</li>
                    <li><i class="fas fa-check-circle"></i> It drives engagement and customer loyalty.</li>
                    <li><i class="fas fa-check-circle"></i> It converts interest into sales.</li>
                    <li><i class="fas fa-check-circle"></i> It fuels business growth and long-term success.</li>
                </ul>
            </div>
            <div class="why-image fade-in" style="transition-delay: 0.4s;">
                <i class="fas fa-bullseye huge-icon"></i>
            </div>
        </div>
    </section>

    <section class="testimonials" id="testimonials">
        <div class="container">
            <h3 class="section-title fade-in">What Our <span class="text-accent">Clients</span> Say</h3>
            <div class="test-grid">
                <div class="test-card fade-in" style="transition-delay: 0.1s;">
                    <i class="fas fa-quote-left test-quote text-accent"></i>
                    <p class="review">WordsmithABC transformed our brand presence. Their strategies are creative, result-driven and truly impactful.</p>
                    <div class="client-info">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Anjaly Nair">
                        <div>
                            <h4>Anjaly Nair</h4>
                            <span>Founder, Aqua Pure</span>
                        </div>
                    </div>
                </div>
                
                <div class="test-card fade-in" style="transition-delay: 0.2s;">
                    <i class="fas fa-quote-left test-quote text-accent"></i>
                    <p class="review">Professional, responsive and result-oriented team. We saw real growth in our business within just a few months.</p>
                    <div class="client-info">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Rohit Menon">
                        <div>
                            <h4>Rohit Menon</h4>
                            <span>CEO, BuildIt Solutions</span>
                        </div>
                    </div>
                </div>
                
                <div class="test-card fade-in" style="transition-delay: 0.3s;">
                    <i class="fas fa-quote-left test-quote text-accent"></i>
                    <p class="review">Their creativity and attention to detail set them apart. Highly recommended for any growing business.</p>
                    <div class="client-info">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Sneha Raj">
                        <div>
                            <h4>Sneha Raj</h4>
                            <span>Marketing Head, Urban Trends</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section" id="contact">
        <div class="container">
            <div class="cta-box fade-in">
                <h2>Let's Build Something<br><span class="text-accent">Amazing</span> Together.</h2>
            </div>
        </div>
    </section>

@endsection