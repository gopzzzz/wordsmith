 @extends('layouts.weblayout')

@section('content')
 
 <main>
        <article>
            <header class="article-hero">
                <div class="container article-hero-inner fade-in">
                    <nav class="breadcrumbs" aria-label="Breadcrumb">
                        <a href="index.html">Home</a>
                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                        <a href="blog.html">Blog</a>
                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                        <span aria-current="page">Branding</span>
                    </nav>

                    <span class="post-category">Branding</span>
                    <h1> </h1>
                    <p class="article-deck">A memorable brand does more than look good. It sounds unmistakably like itself. Here is how to build a voice that earns attention, trust, and loyalty.</p>

                    <div class="article-byline">
                        <div class="author-avatar" aria-hidden="true">WA</div>
                        <div class="author-details">
                            <strong>WordsmithABC Editorial Team</strong>
                            <span>September 12, 2026</span>
                        </div>
                        <span class="byline-divider" aria-hidden="true"></span>
                        <span class="read-time"><i class="fa-regular fa-clock" aria-hidden="true"></i> 7 min read</span>
                    </div>
                </div>
            </header>

            <div class="container article-cover-wrap fade-in">
                <figure class="article-cover">
                   <img src="{{ asset('uploads/blogs/1790665328_portfolio_1.jpg') }}"
     alt="Blog Image"
     class="blog-detail-image">
                    <figcaption>Every strong voice begins with a clear understanding of the brand behind it.</figcaption>
                </figure>
            </div>

            <div class="container article-layout">
                <aside class="article-rail" aria-label="Article tools">
                    <div class="rail-block table-of-contents">
                        <span class="rail-title">In this article</span>
                        <ol>
                        <ol>
    @foreach($blogs as $blog)
        <li>
            <a href="#blog-{{ $blog->id }}">
                {{ $blog->name }}
            </a>
        </li>
    @endforeach
</ol>
                        </ol>
                    </div>
                    <div class="rail-block rail-share">
                        <span class="rail-title">Share this insight</span>
                        <div class="share-buttons">
                            <button type="button" data-share="linkedin" aria-label="Share on LinkedIn"><i class="fa-brands fa-linkedin-in"></i></button>
                            <button type="button" data-share="facebook" aria-label="Share on Facebook"><i class="fa-brands fa-facebook-f"></i></button>
                            <button type="button" data-copy-link aria-label="Copy article link"><i class="fa-solid fa-link"></i></button>
                        </div>
                        <span class="copy-feedback" data-copy-feedback aria-live="polite"></span>
                    </div>
                </aside>

                <div class="article-content" id="article-content">
                  <h2>
    {{ $blog->name }}
</h2>

                  <p>
    {!! nl2br(e($blog->description)) !!}
</p>
                   

                 

                   
            </div>
        </article>

        <section class="author-section" aria-label="About the author">
            <div class="container">
                <div class="author-card fade-in">
                    <div class="author-card-avatar" aria-hidden="true">WA</div>
                    <div>
                        <span class="section-kicker">Written By</span>
                        <h2>WordsmithABC Editorial Team</h2>
                        <p>Strategists, writers, and makers sharing practical ideas to help ambitious brands communicate clearly and grow with purpose.</p>
                    </div>
                    <a href="blog.html">More from the journal <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>

        <section class="related-section" aria-labelledby="related-title">
            <div class="container">
                <div class="related-heading fade-in">
                    <div>
                        <span class="section-kicker">Keep Reading</span>
                        <h2 class="page-heading" id="related-title">More Ideas For Your Brand</h2>
                    </div>
                    <a href="blog.html">View all insights <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                

                <div class="related-grid">
                    <article class="post-card fade-in">
                        <a class="post-image" href="blog-detail.html">
                        <img src="{{ asset($blogs[0]->image) }}" alt="Blog image">
                            <span class="post-category">Content</span>
                        </a>
                        <div class="post-card-body">
                            <div class="post-meta"><span>Aug 29, 2026</span><span>5 min read</span></div>
                            <h3><a href="blog-detail.html">From Blank Page to 30 Days of Content</a></h3>
                            <a class="card-link" href="blog-detail.html">Read insight <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>

                    <article class="post-card fade-in">
                        <a class="post-image" href="blog-detail.html">
                            <img src="{{ asset($blogs[1]->image) }}" alt="Blog image">
                        </a>
                        <div class="post-card-body">
                            <div class="post-meta"><span>Aug 24, 2026</span><span>7 min read</span></div>
                            <h3><a href="blog-detail.html">The Small Brand's Guide to Looking Consistent</a></h3>
                            <a class="card-link" href="blog-detail.html">Read insight <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>

                    <article class="post-card fade-in">
                        <a class="post-image" href="blog-detail.html">
                          <img src="{{ asset($blogs[2]->image) }}" alt="Blog image">
                            <span class="post-category">Growth</span>
                        </a>
                        <div class="post-card-body">
                            <div class="post-meta"><span>Aug 18, 2026</span><span>6 min read</span></div>
                            <h3><a href="blog-detail.html">What Your Analytics Are Really Telling You</a></h3>
                            <a class="card-link" href="blog-detail.html">Read insight <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="newsletter-section detail-newsletter" aria-labelledby="detail-newsletter-title">
            <div class="container">
                <div class="newsletter-panel fade-in">
                    <div class="newsletter-icon" aria-hidden="true"><i class="fa-regular fa-paper-plane"></i></div>
                    <div class="newsletter-copy">
                        <span class="section-kicker">Fresh Thinking, Occasionally</span>
                        <h2 id="detail-newsletter-title">Good ideas, straight to your inbox.</h2>
                        <p>One thoughtful marketing note at a time. No noise, no clutter.</p>
                    </div>
                    <form class="newsletter-form" data-newsletter-form>
                        <label class="sr-only" for="detail-newsletter-email">Email address</label>
                        <input id="detail-newsletter-email" type="email" name="email" placeholder="Your email address" required>
                        <button type="submit">Keep me inspired <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
                        <p class="form-message" data-form-message aria-live="polite"></p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    @endsection