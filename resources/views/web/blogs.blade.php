@extends('layouts.weblayout')

@section('content')

<main>

    <!-- =========================
         BLOG HERO
    ========================== -->
    <section class="page-hero" aria-labelledby="blog-title">

        <div class="container page-hero-inner">

            <div class="hero-copy fade-in">

                <span class="eyebrow">
                    Our Blog
                </span>

                <h1 id="blog-title">
                    Latest <span>Blogs</span>
                </h1>

                <div class="hero-rule"></div>

                <p>
                    Explore our latest insights, ideas and digital marketing updates.
                </p>

            </div>

        </div>

    </section>


    <!-- =========================
         BLOG LIST
    ========================== -->
    <section class="blog-section">

        <div class="container">

            <div class="blog-grid">

                @foreach($blogs as $blog)

                    <article class="blog-card fade-in">

                        <!-- Blog Image -->
                        <div class="blog-image">

                            @if($blog->image)

                                @if(str_starts_with($blog->image, 'uploads/'))

                                    <img src="{{ asset($blog->image) }}"
                                         alt="{{ $blog->name }}">

                                @else

                                    <img src="{{ asset('uploads/' . $blog->image) }}"
                                         alt="{{ $blog->name }}">

                                @endif

                            @endif

                        </div>


                        <!-- Blog Content -->
                        <div class="blog-content">

                            <h3>
                                {{ $blog->name }}
                            </h3>

                            <p>
                                {{ $blog->description }}
                            </p>

                            <a href="{{ route('blogdetails') }}"
                               class="read-more">

                                Read More

                                <i class="fa-solid fa-arrow-right"></i>

                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

        </div>

    </section>

</main>

@endsection