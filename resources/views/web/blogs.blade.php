@extends('layouts.weblayout')

@section('content')

<main>

    <!-- BLOG HERO -->
    <section class="page-hero blog-hero" aria-labelledby="blog-hero-title">

        <div class="container page-hero-inner">

            <div class="hero-copy fade-in">

                <span class="eyebrow">Insights & Ideas</span>

                <h1 id="blog-hero-title">
                    Words That Inspire.<br>
                    <span>Ideas That Grow.</span>
                </h1>

                <div class="hero-rule"></div>

                <p>
                    Fresh thinking, useful strategies, and honest marketing advice
                    to help your brand make a meaningful impact.
                </p>

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

                        <strong>
                            Write boldly.<br>
                            Grow meaningfully.
                        </strong>
                    </div>

                    <div class="editorial-lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <div class="editorial-card-bottom">
                        <span>STRATEGY</span>
                        <span>STORIES</span>
                        <span>GROWTH</span>
                    </div>

                </div>

                <div class="idea-chip chip-one">
                    <i class="fa-regular fa-lightbulb"></i>
                    <span>Ideas</span>
                </div>

                <div class="idea-chip chip-two">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                    <span>Growth</span>
                </div>

                <div class="idea-chip chip-three">
                    <i class="fa-solid fa-quote-left"></i>
                </div>

            </div>

        </div>

    </section>


    <!-- BLOG LIBRARY -->
    <section class="blog-library" aria-labelledby="journal-title">

        <div class="container">

            <div class="journal-heading fade-in">

                <div>
                    <span class="section-kicker">The Wordsmith Journal</span>

                    <h2 class="page-heading" id="journal-title">
                        Ideas Worth Sharing
                    </h2>
                </div>

                <p>
                    Explore practical perspectives on branding, content,
                    digital marketing, and building a business people remember.
                </p>

            </div>


            @forelse($blogs as $blog)

                @if($loop->first)

                    <!-- FEATURED BLOG -->
                    <article class="featured-post fade-in">

                        <a class="featured-image"
                           href="{{ route('blogdetails') }}"
                           aria-label="Read {{ $blog->name }}">

                            @if(!empty($blog->image))

                                @if(str_starts_with($blog->image, 'uploads/'))
                                    <img src="{{ asset($blog->image) }}"
                                         alt="{{ $blog->name }}">
                                @else
                                    <img src="{{ asset('uploads/' . $blog->image) }}"
                                         alt="{{ $blog->name }}">
                                @endif

                            @endif

                            <span class="featured-label">
                                <i class="fa-solid fa-star" aria-hidden="true"></i>
                                Featured insight
                            </span>

                        </a>

                        <div class="featured-content">

                            <span class="post-category">Insights</span>

                            <h3>
                                <a href="{{ route('blogdetails') }}">
                                    {{ $blog->name }}
                                </a>
                            </h3>

                            <p>
                                {{ $blog->description }}
                            </p>
                        <a href="{{ route('blogdetails', $blog->id) }}" class="read-article">
    Read the article <span>→</span>
</a>
                        </div>

                    </article>

                    <!-- BLOG GRID -->
                    <div class="article-grid" id="article-grid">

                @else

                    <article class="post-card fade-in"
                             data-category="all"
                             data-search="{{ strtolower($blog->name . ' ' . $blog->description) }}">

                        <a class="post-image"
                           href="{{ route('blogdetails') }}"
                           aria-label="Read {{ $blog->name }}">

                            @if(!empty($blog->image))

                                @if(str_starts_with($blog->image, 'uploads/'))
                                    <img src="{{ asset($blog->image) }}"
                                         alt="{{ $blog->name }}">
                                @else
                                    <img src="{{ asset('uploads/' . $blog->image) }}"
                                         alt="{{ $blog->name }}">
                                @endif

                            @endif

                            <span class="post-category">
                                Insights
                            </span>

                        </a>

                        <div class="post-card-body">

                            <div class="post-meta">
                                <span>Latest</span>
                                <span>Insights</span>
                            </div>

                            <h3>
                                <a href="{{ route('blogdetails') }}">
                                    {{ $blog->name }}
                                </a>
                            </h3>

                            <p>
                                {{ $blog->description }}
                            </p>

                            <a class="card-link"
                               href="{{ route('blogdetails') }}"
                               aria-label="Read {{ $blog->name }}">

                                Read insight

                                <i class="fa-solid fa-arrow-right"
                                   aria-hidden="true"></i>

                            </a>

                        </div>

                    </article>

                @endif

            @empty

                <div class="no-results">

                    <i class="fa-regular fa-folder-open"
                       aria-hidden="true"></i>

                    <h3>No insights found</h3>

                    <p>
                        There are currently no blog posts available.
                    </p>

                </div>

            @endforelse


            @if($blogs->count() > 1)
                </div>
            @endif

        </div>

    </section>


    <!-- NEWSLETTER -->
    <section class="newsletter-section"
             aria-labelledby="newsletter-title">

        <div class="container">

            <div class="newsletter-panel fade-in">

                <div class="newsletter-icon" aria-hidden="true">
                    <i class="fa-regular fa-paper-plane"></i>
                </div>

                <div class="newsletter-copy">

                    <span class="section-kicker">
                        Fresh Thinking, Occasionally
                    </span>

                    <h2 id="newsletter-title">
                        Good ideas, straight to your inbox.
                    </h2>

                    <p>
                        One thoughtful marketing note at a time.
                        No noise, no clutter.
                    </p>

                </div>

                <form class="newsletter-form">

                    <label class="sr-only" for="newsletter-email">
                        Email address
                    </label>

                    <input id="newsletter-email"
                           type="email"
                           name="email"
                           placeholder="Your email address"
                           required>

                    <button type="submit">
                        Keep me inspired
                        <i class="fa-solid fa-arrow-right"
                           aria-hidden="true"></i>
                    </button>

                </form>

            </div>

        </div>

    </section>

</main>

@endsection
