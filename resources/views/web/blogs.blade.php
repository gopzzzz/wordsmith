@extends('layouts.weblayout')

@section('content')


<main>
        <section class="page-hero blog-hero" aria-labelledby="blog-hero-title">
            <div class="container page-hero-inner">
                <div class="hero-copy fade-in">
                    <span class="eyebrow">Insights &amp; Ideas</span>
                    <h1 id="blog-hero-title">Words That Inspire.<br><span>Ideas That Grow.</span></h1>
                    <div class="hero-rule"></div>
                    <p>Fresh thinking, useful strategies, and honest marketing advice to help your brand make a meaningful impact.</p>
                </div>

                <div class="hero-art blog-hero-visual fade-in" aria-hidden="true">
                    <div class="editorial-orbit orbit-one"></div>
                    <div class="editorial-orbit orbit-two"></div>
                    <div class="editorial-card">
                        <div class="editorial-card-top">
                            <span>THE WORDSMITH JOURNAL</span>
                            <i class="fa-solid fa-feather-pointed"></i>
                        </div>
                        <div class="editorial-copy">
                            <span class="editorial-kicker">Think clearly.</span>
                            <strong>Write boldly.<br>Grow meaningfully.</strong>
                        </div>
                        <div class="editorial-lines"><span></span><span></span><span></span></div>
                        <div class="editorial-card-bottom"><span>STRATEGY</span><span>STORIES</span><span>GROWTH</span></div>
                    </div>
                    <div class="idea-chip chip-one"><i class="fa-regular fa-lightbulb"></i><span>Ideas</span></div>
                    <div class="idea-chip chip-two"><i class="fa-solid fa-arrow-trend-up"></i><span>Growth</span></div>
                    <div class="idea-chip chip-three"><i class="fa-solid fa-quote-left"></i></div>
                </div>
            </div>
        </section>

        <section class="blog-library" aria-labelledby="journal-title">
            <div class="container">
                <div class="journal-heading fade-in">
                    <div>
                        <span class="section-kicker">The Wordsmith Journal</span>
                        <h2 class="page-heading" id="journal-title">Ideas Worth Sharing</h2>
                    </div>
                    <p>Explore practical perspectives on branding, content, digital marketing, and building a business people remember.</p>
                </div>

                <article class="featured-post fade-in">
                    <a class="featured-image" href="blog-detail.html" aria-label="Read Building a Brand Voice People Remember">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&amp;fit=crop&amp;w=1400&amp;q=85" alt="Creative team shaping a brand strategy on a whiteboard">
                        <span class="featured-label"><i class="fa-solid fa-star" aria-hidden="true"></i> Featured insight</span>
                    </a>
                    <div class="featured-content">
                        <span class="post-category">Branding</span>
                        <h3><a href="blog-detail.html">Building a Brand Voice People Remember</a></h3>
                        <p>A memorable brand does more than look good. It sounds unmistakably like itself. Learn how to create a voice that earns attention, trust, and loyalty.</p>
                        <div class="post-meta">
                            <span><i class="fa-regular fa-calendar" aria-hidden="true"></i> Sep 12, 2026</span>
                            <span><i class="fa-regular fa-clock" aria-hidden="true"></i> 7 min read</span>
                        </div>
                        <a class="read-more" href="blog-detail.html">Read the article <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </article>

                <div class="blog-tools fade-in" aria-label="Filter articles">
                    <div class="filter-list" role="group" aria-label="Filter by topic">
                        <button class="filter-button active" type="button" data-filter="all" aria-pressed="true">All insights</button>
                        <button class="filter-button" type="button" data-filter="branding" aria-pressed="false">Branding</button>
                        <button class="filter-button" type="button" data-filter="digital" aria-pressed="false">Digital marketing</button>
                        <button class="filter-button" type="button" data-filter="content" aria-pressed="false">Content</button>
                        <button class="filter-button" type="button" data-filter="growth" aria-pressed="false">Growth</button>
                    </div>
                    <div class="blog-search">
                        <label class="sr-only" for="blog-search">Search articles</label>
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                        <input id="blog-search" type="search" placeholder="Search insights" autocomplete="off">
                    </div>
                </div>

                <p class="results-status sr-only" id="results-status" aria-live="polite"></p>

                <div class="article-grid" id="article-grid">
                    <article class="post-card fade-in" data-category="digital" data-search="social media habits community engagement digital marketing">
                        <a class="post-image" href="blog-detail.html" aria-label="Read 7 Social Media Habits That Build Real Community">
                            <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&amp;fit=crop&amp;w=900&amp;q=82" alt="Social media applications displayed on a smartphone">
                            <span class="post-category">Digital Marketing</span>
                        </a>
                        <div class="post-card-body">
                            <div class="post-meta"><span>Sep 8, 2026</span><span>6 min read</span></div>
                            <h3><a href="blog-detail.html">7 Social Media Habits That Build Real Community</a></h3>
                            <p>Move beyond posting for reach and start creating conversations people want to return to.</p>
                            <a class="card-link" href="blog-detail.html" aria-label="Read 7 Social Media Habits That Build Real Community">Read insight <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>

                    <article class="post-card fade-in" data-category="growth" data-search="seo search growth organic traffic guide">
                        <a class="post-image" href="blog-detail.html" aria-label="Read SEO Without the Jargon: A Practical Growth Guide">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&amp;fit=crop&amp;w=900&amp;q=82" alt="Laptop showing website analytics and performance data">
                            <span class="post-category">Growth</span>
                        </a>
                        <div class="post-card-body">
                            <div class="post-meta"><span>Sep 3, 2026</span><span>8 min read</span></div>
                            <h3><a href="blog-detail.html">SEO Without the Jargon: A Practical Growth Guide</a></h3>
                            <p>The essentials of getting found online, explained in a way your whole team can use.</p>
                            <a class="card-link" href="blog-detail.html" aria-label="Read SEO Without the Jargon">Read insight <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>

                    <article class="post-card fade-in" data-category="content" data-search="content calendar writing ideas blank page planning">
                        <a class="post-image" href="blog-detail.html" aria-label="Read From Blank Page to 30 Days of Content">
                            <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&amp;fit=crop&amp;w=900&amp;q=82" alt="Notebook and pen ready for content planning">
                            <span class="post-category">Content</span>
                        </a>
                        <div class="post-card-body">
                            <div class="post-meta"><span>Aug 29, 2026</span><span>5 min read</span></div>
                            <h3><a href="blog-detail.html">From Blank Page to 30 Days of Content</a></h3>
                            <p>A simple planning framework for creating useful content without burning out your team.</p>
                            <a class="card-link" href="blog-detail.html" aria-label="Read From Blank Page to 30 Days of Content">Read insight <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>

                    <article class="post-card fade-in" data-category="branding" data-search="small brand visual identity branding guide design">
                        <a class="post-image" href="blog-detail.html" aria-label="Read The Small Brand's Guide to Looking Consistent">
                            <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?auto=format&amp;fit=crop&amp;w=900&amp;q=82" alt="Designer arranging a cohesive visual brand identity">
                            <span class="post-category">Branding</span>
                        </a>
                        <div class="post-card-body">
                            <div class="post-meta"><span>Aug 24, 2026</span><span>7 min read</span></div>
                            <h3><a href="blog-detail.html">The Small Brand's Guide to Looking Consistent</a></h3>
                            <p>How to build a recognizable identity across every customer touchpoint, on any budget.</p>
                            <a class="card-link" href="blog-detail.html" aria-label="Read The Small Brand's Guide to Looking Consistent">Read insight <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>

                    <article class="post-card fade-in" data-category="growth" data-search="analytics data metrics growth marketing decisions dashboard">
                        <a class="post-image" href="blog-detail.html" aria-label="Read What Your Analytics Are Really Telling You">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&amp;fit=crop&amp;w=900&amp;q=82" alt="Marketing performance dashboard with charts and metrics">
                            <span class="post-category">Growth</span>
                        </a>
                        <div class="post-card-body">
                            <div class="post-meta"><span>Aug 18, 2026</span><span>6 min read</span></div>
                            <h3><a href="blog-detail.html">What Your Analytics Are Really Telling You</a></h3>
                            <p>Five signals that turn busy dashboards into clearer, more confident marketing decisions.</p>
                            <a class="card-link" href="blog-detail.html" aria-label="Read What Your Analytics Are Really Telling You">Read insight <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>

                    <article class="post-card fade-in" data-category="digital" data-search="campaign connection audience digital marketing strategy team">
                        <a class="post-image" href="blog-detail.html" aria-label="Read Campaigns That Connect Before They Convert">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&amp;fit=crop&amp;w=900&amp;q=82" alt="Marketing team discussing a campaign strategy">
                            <span class="post-category">Digital Marketing</span>
                        </a>
                        <div class="post-card-body">
                            <div class="post-meta"><span>Aug 11, 2026</span><span>9 min read</span></div>
                            <h3><a href="blog-detail.html">Campaigns That Connect Before They Convert</a></h3>
                            <p>Why the strongest campaigns begin with an audience truth, not a sales message.</p>
                            <a class="card-link" href="blog-detail.html" aria-label="Read Campaigns That Connect Before They Convert">Read insight <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>
                </div>

                <div class="no-results" id="no-results" hidden>
                    <i class="fa-regular fa-folder-open" aria-hidden="true"></i>
                    <h3>No insights found</h3>
                    <p>Try a different topic or search phrase.</p>
                    <button type="button" id="clear-filters">Show all insights</button>
                </div>
            </div>
        </section>

        <section class="newsletter-section" aria-labelledby="newsletter-title">
            <div class="container">
                <div class="newsletter-panel fade-in">
                    <div class="newsletter-icon" aria-hidden="true"><i class="fa-regular fa-paper-plane"></i></div>
                    <div class="newsletter-copy">
                        <span class="section-kicker">Fresh Thinking, Occasionally</span>
                        <h2 id="newsletter-title">Good ideas, straight to your inbox.</h2>
                        <p>One thoughtful marketing note at a time. No noise, no clutter.</p>
                    </div>
                    <form class="newsletter-form" data-newsletter-form>
                        <label class="sr-only" for="newsletter-email">Email address</label>
                        <input id="newsletter-email" type="email" name="email" placeholder="Your email address" required>
                        <button type="submit">Keep me inspired <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
                        <p class="form-message" data-form-message aria-live="polite"></p>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection