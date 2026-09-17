@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- ============================= -->
    <!-- CONTENT HEADER -->
    <!-- ============================= -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Page Edit</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Page Edit
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- ============================= -->
    <!-- MAIN CONTENT -->
    <!-- ============================= -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">

                        <!-- CARD HEADER -->

                        <div class="card-header">

                            <h3 class="card-title">
                                Edit Homepage
                            </h3>

                        </div>


                        <!-- SUCCESS MESSAGE -->

                        @if(session('success'))

                            <div class="alert alert-success alert-dismissible fade show m-3">

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


                        <!-- ERROR MESSAGE -->

                        @if(session('error'))

                            <div class="alert alert-danger alert-dismissible fade show m-3">

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


                        <!-- VALIDATION ERRORS -->

                        @if($errors->any())

                            <div class="alert alert-danger m-3">

                                <ul class="mb-0">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <!-- ============================= -->
                        <!-- FORM -->
                        <!-- ============================= -->

                        <form
                            action="{{ route('page_edit.save') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <div class="card-body">


                                <!-- ABOUT TITLE -->

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


                                <!-- ABOUT DESCRIPTION -->

                                <div class="form-group">

                                    <label>
                                        About Description
                                    </label>

                                    <textarea
                                        name="aboutdescription"
                                        class="form-control"
                                        rows="4"
                                        placeholder="Enter about description"
                                    >{{ old('aboutdescription', $homepage->aboutdescription ?? '') }}</textarea>

                                </div>


                                <!-- ABOUT IMAGE -->

                                <div class="form-group">

                                    <label>
                                        About Image
                                    </label>

                                    <input
                                        type="file"
                                        name="about_image"
                                        class="form-control-file"
                                        accept=".jpg,.jpeg,.png,.webp"
                                    >

                                </div>


                                <!-- CURRENT IMAGE -->

                                @if(!empty($homepage->about_image))

                                    <div class="form-group">

                                        <label>
                                            Current Image
                                        </label>

                                        <br>

                                        <img
                                            src="{{ asset($homepage->about_image) }}"
                                            alt="About Image"
                                            style="max-width:200px; height:auto;"
                                            class="img-thumbnail"
                                        >

                                    </div>

                                @endif


                                <!-- FIRST QUOTE -->

                                <div class="form-group">

                                    <label>
                                        First Quote
                                    </label>

                                    <input
                                        type="text"
                                        name="firstquote"
                                        class="form-control"
                                        value="{{ old('firstquote', $homepage->firstquote ?? '') }}"
                                        placeholder="Enter first quote"
                                    >

                                </div>


                                <!-- SECOND QUOTE -->

                                <div class="form-group">

                                    <label>
                                        Second Quote
                                    </label>

                                    <input
                                        type="text"
                                        name="secondquote"
                                        class="form-control"
                                        value="{{ old('secondquote', $homepage->secondquote ?? '') }}"
                                        placeholder="Enter second quote"
                                    >

                                </div>


                                <!-- THIRD QUOTE -->

                                <div class="form-group">

                                    <label>
                                        Third Quote
                                    </label>

                                    <input
                                        type="text"
                                        name="thirdquote"
                                        class="form-control"
                                        value="{{ old('thirdquote', $homepage->thirdquote ?? '') }}"
                                        placeholder="Enter third quote"
                                    >

                                </div>


                                <!-- VISION -->

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


                                <!-- MISSION -->

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


                                <!-- FOUNDER QUOTE -->

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


                            <!-- ============================= -->
                            <!-- FOOTER -->
                            <!-- ============================= -->

                            <div class="card-footer">

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >

                                    <i class="fas fa-save"></i>

                                    Save Page

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