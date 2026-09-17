@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- ========================================================= -->
    <!-- PAGE HEADER -->
    <!-- ========================================================= -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>
                        <i class="fas fa-edit"></i>
                        Page Edit
                    </h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Page Edit
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">


                        <!-- ================================================= -->
                        <!-- CARD HEADER -->
                        <!-- ================================================= -->

                        <div class="card-header">

                            <h3 class="card-title">

                                <i class="fas fa-edit"></i>

                                Edit Homepage

                            </h3>

                        </div>


                        <!-- ================================================= -->
                        <!-- SUCCESS MESSAGE -->
                        <!-- ================================================= -->

                        @if(session('success'))

                            <div class="alert alert-success alert-dismissible fade show m-3">

                                <i class="fas fa-check-circle"></i>

                                {{ session('success') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                >

                                    <span>&times;</span>

                                </button>

                            </div>

                        @endif


                        <!-- ================================================= -->
                        <!-- ERROR MESSAGE -->
                        <!-- ================================================= -->

                        @if(session('error'))

                            <div class="alert alert-danger alert-dismissible fade show m-3">

                                <i class="fas fa-exclamation-circle"></i>

                                {{ session('error') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                >

                                    <span>&times;</span>

                                </button>

                            </div>

                        @endif


                        <!-- ================================================= -->
                        <!-- VALIDATION ERRORS -->
                        <!-- ================================================= -->

                        @if($errors->any())

                            <div class="alert alert-danger m-3">

                                <strong>
                                    Please fix the following errors:
                                </strong>

                                <ul class="mb-0 mt-2">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <!-- ================================================= -->
                        <!-- FORM -->
                        <!-- ================================================= -->

                        <form
                            action="{{ route('page_edit.save') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <div class="card-body">


                                <!-- ================================================= -->
                                <!-- ABOUT SECTION -->
                                <!-- ================================================= -->

                                <div class="mb-4">

                                    <h4 class="border-bottom pb-2">

                                        <i class="fas fa-info-circle"></i>

                                        About Section

                                    </h4>

                                </div>


                                <!-- About Title -->

                                <div class="form-group">

                                    <label>
                                        About Title
                                    </label>

                                    <input
                                        type="text"
                                        name="aboutitle"
                                        class="form-control"
                                        value="{{ old('aboutitle', $homepage->aboutitle ?? '') }}"
                                        placeholder="Enter about title"
                                    >

                                </div>


                                <!-- About Description -->

                                <div class="form-group">

                                    <label>
                                        About Description
                                    </label>

                                    <textarea
                                        name="aboutdescription"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Enter about description"
                                    >{{ old('aboutdescription', $homepage->aboutdescription ?? '') }}</textarea>

                                </div>


                                <!-- About Image -->

                                <div class="form-group">

                                    <label>
                                        About Image
                                    </label>


                                    @if(!empty($homepage->about_image))

                                        <div class="mb-3">

                                            <label class="d-block">
                                                Current Image
                                            </label>

                                            <img
                                                src="{{ asset($homepage->about_image) }}"
                                                alt="About Image"
                                                class="img-thumbnail"
                                                style="
                                                    width: 250px;
                                                    height: 180px;
                                                    object-fit: cover;
                                                "
                                            >

                                        </div>

                                    @endif


                                    <input
                                        type="file"
                                        name="about_image"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.webp"
                                    >

                                    <small class="text-muted">

                                        Leave empty to keep the current image.

                                        <br>

                                        Allowed:
                                        JPG, JPEG, PNG, WEBP.

                                        Maximum size: 2 MB.

                                    </small>

                                </div>


                                <hr class="my-4">


                                <!-- ================================================= -->
                                <!-- QUOTES SECTION -->
                                <!-- ================================================= -->

                                <div class="mb-4">

                                    <h4 class="border-bottom pb-2">

                                        <i class="fas fa-quote-left"></i>

                                        Quotes

                                    </h4>

                                </div>


                                <!-- First Quote -->

                                <div class="form-group">

                                    <label>
                                        First Quote
                                    </label>

                                    <textarea
                                        name="firstquote"
                                        class="form-control"
                                        rows="3"
                                        placeholder="Enter first quote"
                                    >{{ old('firstquote', $homepage->firstquote ?? '') }}</textarea>

                                </div>


                                <!-- Second Quote -->

                                <div class="form-group">

                                    <label>
                                        Second Quote
                                    </label>

                                    <textarea
                                        name="secondquote"
                                        class="form-control"
                                        rows="3"
                                        placeholder="Enter second quote"
                                    >{{ old('secondquote', $homepage->secondquote ?? '') }}</textarea>

                                </div>


                                <!-- Third Quote -->

                                <div class="form-group">

                                    <label>
                                        Third Quote
                                    </label>

                                    <textarea
                                        name="thirdquote"
                                        class="form-control"
                                        rows="3"
                                        placeholder="Enter third quote"
                                    >{{ old('thirdquote', $homepage->thirdquote ?? '') }}</textarea>

                                </div>


                                <hr class="my-4">


                                <!-- ================================================= -->
                                <!-- VISION & MISSION -->
                                <!-- ================================================= -->

                                <div class="mb-4">

                                    <h4 class="border-bottom pb-2">

                                        <i class="fas fa-bullseye"></i>

                                        Vision & Mission

                                    </h4>

                                </div>


                                <!-- Vision -->

                                <div class="form-group">

                                    <label>
                                        Vision
                                    </label>

                                    <textarea
                                        name="vision"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Enter vision"
                                    >{{ old('vision', $homepage->vision ?? '') }}</textarea>

                                </div>


                                <!-- Mission -->

                                <div class="form-group">

                                    <label>
                                        Mission
                                    </label>

                                    <textarea
                                        name="mission"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Enter mission"
                                    >{{ old('mission', $homepage->mission ?? '') }}</textarea>

                                </div>


                                <hr class="my-4">


                                <!-- ================================================= -->
                                <!-- FOUNDER SECTION -->
                                <!-- ================================================= -->

                                <div class="mb-4">

                                    <h4 class="border-bottom pb-2">

                                        <i class="fas fa-user"></i>

                                        Founder

                                    </h4>

                                </div>


                                <!-- Founder Quote -->

                                <div class="form-group">

                                    <label>
                                        Founder Quote
                                    </label>

                                    <textarea
                                        name="founderquote"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Enter founder quote"
                                    >{{ old('founderquote', $homepage->founderquote ?? '') }}</textarea>

                                </div>


                            </div>


                            <!-- ================================================= -->
                            <!-- CARD FOOTER -->
                            <!-- ================================================= -->

                            <div class="card-footer">

                                @if($homepage)

                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >

                                        <i class="fas fa-save"></i>

                                        Update Page

                                    </button>

                                @else

                                    <button
                                        type="submit"
                                        class="btn btn-success"
                                    >

                                        <i class="fas fa-plus"></i>

                                        Save Page

                                    </button>

                                @endif


                                <button
                                    type="reset"
                                    class="btn btn-secondary"
                                >

                                    <i class="fas fa-undo"></i>

                                    Reset

                                </button>

                            </div>


                        </form>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection