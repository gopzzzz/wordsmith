@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- PAGE HEADER -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Portfolio</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Portfolio
                        </li>

                    </ol>
                </div>

            </div>

        </div>
    </section>


    <!-- MAIN CONTENT -->
    <section class="content">

        <div class="container-fluid">

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        &times;

                    </button>

                </div>

            @endif


            <!-- ERROR MESSAGE -->
            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    {{ session('error') }}

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        &times;

                    </button>

                </div>

            @endif


            <!-- VALIDATION ERRORS -->
            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- PORTFOLIO CARD -->
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Portfolio Gallery
                    </h3>

                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addPortfolioModal">

                        <i class="fas fa-plus"></i>
                        Add Portfolio

                    </button>

                </div>


                <div class="card-body">

                    <!-- GALLERY -->
                    <div class="row">

                        @forelse($portfolios as $portfolio)

                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">

                                <div class="card h-100 shadow-sm portfolio-card">

                                    <!-- IMAGE -->
                                    <div class="portfolio-image">

                                        @if($portfolio->image)

                                            <img src="{{ asset('uploads/' . $portfolio->image) }}"
                                                 class="img-fluid"
                                                 alt="{{ $portfolio->name }}">

                                        @else

                                            <div class="no-image">
                                                <i class="fas fa-image fa-3x"></i>
                                                <p class="mt-2 mb-0">
                                                    No Image
                                                </p>
                                            </div>

                                        @endif

                                    </div>


                                    <!-- DETAILS -->
                                    <div class="card-body">

                                        <h5 class="card-title font-weight-bold">

                                            {{ $portfolio->name }}

                                        </h5>

                                    </div>


                                    <!-- ACTIONS -->
                                    <div class="card-footer bg-white">

                                        <button type="button"
                                                class="btn btn-sm btn-primary"
                                                data-toggle="modal"
                                                data-target="#editPortfolio{{ $portfolio->id }}">

                                            <i class="fas fa-edit"></i>
                                            Edit

                                        </button>


                                        <a href="{{ route('portfolio.delete', $portfolio->id) }}"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Are you sure you want to delete this portfolio?')">

                                            <i class="fas fa-trash"></i>
                                            Delete

                                        </a>

                                    </div>

                                </div>

                            </div>


                            <!-- EDIT MODAL -->
                            <div class="modal fade"
                                 id="editPortfolio{{ $portfolio->id }}"
                                 tabindex="-1"
                                 role="dialog">

                                <div class="modal-dialog"
                                     role="document">

                                    <div class="modal-content">

                                        <form action="{{ route('portfolio.update', $portfolio->id) }}"
                                              method="POST"
                                              enctype="multipart/form-data">

                                            @csrf

                                            <div class="modal-header">

                                                <h4 class="modal-title">
                                                    Edit Portfolio
                                                </h4>

                                                <button type="button"
                                                        class="close"
                                                        data-dismiss="modal">

                                                    &times;

                                                </button>

                                            </div>


                                            <div class="modal-body">

                                                <!-- NAME -->
                                                <div class="form-group">

                                                    <label>
                                                        Name
                                                    </label>

                                                    <input type="text"
                                                           name="name"
                                                           class="form-control"
                                                           value="{{ $portfolio->name }}"
                                                           required>

                                                </div>


                                                <!-- CURRENT IMAGE -->
                                                @if($portfolio->image)

                                                    <div class="form-group">

                                                        <label>
                                                            Current Image
                                                        </label>

                                                        <div>

                                                            <img src="{{ asset('uploads/' . $portfolio->image) }}"
                                                                 class="img-fluid"
                                                                 style="max-width:250px;
                                                                        max-height:160px;
                                                                        object-fit:cover;
                                                                        border-radius:6px;">

                                                        </div>

                                                    </div>

                                                @endif


                                                <!-- NEW IMAGE -->
                                                <div class="form-group">

                                                    <label>
                                                        Change Image
                                                    </label>

                                                    <input type="file"
                                                           name="image"
                                                           class="form-control"
                                                           accept="image/*">

                                                    <small class="text-muted">
                                                        Leave empty to keep the current image.
                                                        Maximum size: 10 MB.
                                                    </small>

                                                </div>

                                            </div>


                                            <div class="modal-footer">

                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-dismiss="modal">

                                                    Close

                                                </button>

                                                <button type="submit"
                                                        class="btn btn-primary">

                                                    <i class="fas fa-save"></i>
                                                    Update Portfolio

                                                </button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <!-- NO PORTFOLIO -->
                            <div class="col-12">

                                <div class="text-center py-5">

                                    <i class="fas fa-images fa-4x text-muted"></i>

                                    <h5 class="mt-3">
                                        No portfolios found
                                    </h5>

                                    <p class="text-muted">
                                        Click "Add Portfolio" to create your first portfolio.
                                    </p>

                                </div>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<!-- ========================================= -->
<!-- ADD PORTFOLIO MODAL -->
<!-- ========================================= -->

<div class="modal fade"
     id="addPortfolioModal"
     tabindex="-1"
     role="dialog">

    <div class="modal-dialog"
         role="document">

        <div class="modal-content">

            <form action="{{ route('portfolio.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <!-- MODAL HEADER -->
                <div class="modal-header">

                    <h4 class="modal-title">
                        Add Portfolio
                    </h4>

                    <button type="button"
                            class="close"
                            data-dismiss="modal">

                        &times;

                    </button>

                </div>


                <!-- MODAL BODY -->
                <div class="modal-body">

                    <!-- NAME -->
                    <div class="form-group">

                        <label>
                            Name
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Enter portfolio name"
                               required>

                    </div>


                    <!-- IMAGE -->
                    <div class="form-group">

                        <label>
                            Image
                        </label>

                        <input type="file"
                               name="image"
                               id="portfolioImage"
                               class="form-control"
                               accept="image/*"
                               required>

                        <small class="text-muted">
                            Maximum image size: 10 MB.
                        </small>

                    </div>


                    <!-- IMAGE PREVIEW -->
                    <div id="portfolioImagePreview"
                         class="mt-3 text-center"
                         style="display:none;">

                        <img id="previewImage"
                             src=""
                             class="img-fluid"
                             style="max-width:250px;
                                    max-height:180px;
                                    object-fit:cover;
                                    border-radius:6px;">

                    </div>

                </div>


                <!-- MODAL FOOTER -->
                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                        Close

                    </button>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Save Portfolio

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- ========================================= -->
<!-- GALLERY CSS -->
<!-- ========================================= -->

<style>

    .portfolio-card {
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.25s ease;
    }

    .portfolio-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15) !important;
    }

    .portfolio-image {
        width: 100%;
        height: 230px;
        background: #f4f4f4;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .portfolio-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .no-image {
        text-align: center;
        color: #999;
    }

    .portfolio-card .card-title {
        margin-bottom: 0;
        word-break: break-word;
    }

    .portfolio-card .card-footer {
        border-top: 1px solid #eee;
    }

</style>


<!-- ========================================= -->
<!-- IMAGE PREVIEW JAVASCRIPT -->
<!-- ========================================= -->

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const imageInput = document.getElementById('portfolioImage');

        const previewContainer =
            document.getElementById('portfolioImagePreview');

        const previewImage =
            document.getElementById('previewImage');


        if (imageInput) {

            imageInput.addEventListener('change', function (event) {

                const file = event.target.files[0];

                if (!file) {

                    previewContainer.style.display = 'none';

                    previewImage.src = '';

                    return;
                }


                const reader = new FileReader();


                reader.onload = function (e) {

                    previewImage.src = e.target.result;

                    previewContainer.style.display = 'block';

                };


                reader.readAsDataURL(file);

            });

        }

    });

</script>


@endsection