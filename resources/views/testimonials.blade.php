@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- ===================================================== -->
    <!-- CONTENT HEADER -->
    <!-- ===================================================== -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Testimonials</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Testimonials
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">


                        <!-- ================================================= -->
                        <!-- CARD HEADER -->
                        <!-- ================================================= -->

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h3 class="card-title">
                                Testimonial List
                            </h3>


                            <!-- ADD BUTTON -->

                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#newTestimonialModal"
                            >

                                <i class="fas fa-plus"></i>

                                New Testimonial

                            </button>

                        </div>


                        <!-- ================================================= -->
                        <!-- SUCCESS MESSAGE -->
                        <!-- ================================================= -->

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


                        <!-- ================================================= -->
                        <!-- ERROR MESSAGE -->
                        <!-- ================================================= -->

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


                        <!-- ================================================= -->
                        <!-- VALIDATION ERRORS -->
                        <!-- ================================================= -->

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


                        <!-- ================================================= -->
                        <!-- TESTIMONIAL TABLE -->
                        <!-- ================================================= -->

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover">

                                    <thead>

                                        <tr>

                                            <th style="width:60px;">
                                                #
                                            </th>

                                            <th style="width:110px;">
                                                Image
                                            </th>

                                            <th>
                                                Name
                                            </th>

                                            <th>
                                                Description
                                            </th>

                                            <th>
                                                Occupation
                                            </th>

                                            <th style="width:220px;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>


                                        @forelse($testimonials as $testimonial)


                                            <tr>


                                                <!-- ================================= -->
                                                <!-- ID -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $testimonial->id }}

                                                </td>


                                                <!-- ================================= -->
                                                <!-- IMAGE -->
                                                <!-- ================================= -->

                                                <td class="text-center">

                                                    @if($testimonial->image)

                                                        <img
                                                            src="{{ asset($testimonial->image) }}"
                                                            width="70"
                                                            height="70"
                                                            style="object-fit:cover;"
                                                            class="border rounded"
                                                            alt="{{ $testimonial->name }}"
                                                        >

                                                    @else

                                                        <span class="text-muted">
                                                            No Image
                                                        </span>

                                                    @endif

                                                </td>


                                                <!-- ================================= -->
                                                <!-- NAME -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $testimonial->name }}

                                                </td>


                                                <!-- ================================= -->
                                                <!-- DESCRIPTION -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $testimonial->description }}

                                                </td>


                                                <!-- ================================= -->
                                                <!-- OCCUPATION -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $testimonial->occupations }}

                                                </td>


                                                <!-- ================================= -->
                                                <!-- ACTION -->
                                                <!-- ================================= -->

                                                <td class="text-center">


                                                    <!-- EDIT -->

                                                    <button
                                                        type="button"
                                                        class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editTestimonialModal{{ $testimonial->id }}"
                                                    >

                                                        <i class="fas fa-edit"></i>

                                                        Edit

                                                    </button>


                                                    <!-- DELETE -->

                                                    <button
                                                        type="button"
                                                        class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#deleteTestimonialModal{{ $testimonial->id }}"
                                                    >

                                                        <i class="fas fa-trash"></i>

                                                        Delete

                                                    </button>


                                                </td>


                                            </tr>



                                            <!-- ===================================================== -->
                                            <!-- EDIT TESTIMONIAL MODAL -->
                                            <!-- ===================================================== -->

                                            <div
                                                class="modal fade"
                                                id="editTestimonialModal{{ $testimonial->id }}"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="editTestimonialModalLabel{{ $testimonial->id }}"
                                                aria-hidden="true"
                                            >

                                                <div
                                                    class="modal-dialog modal-lg"
                                                    role="document"
                                                >


                                                    <form
                                                        action="{{ route('testimonials.update', $testimonial->id) }}"
                                                        method="POST"
                                                        enctype="multipart/form-data"
                                                    >

                                                        @csrf

                                                        @method('PUT')


                                                        <div class="modal-content">


                                                            <!-- ================================= -->
                                                            <!-- EDIT HEADER -->
                                                            <!-- ================================= -->

                                                            <div class="modal-header">

                                                                <h5
                                                                    class="modal-title"
                                                                    id="editTestimonialModalLabel{{ $testimonial->id }}"
                                                                >

                                                                    <i class="fas fa-edit"></i>

                                                                    Edit Testimonial

                                                                </h5>


                                                                <button
                                                                    type="button"
                                                                    class="close"
                                                                    data-dismiss="modal"
                                                                >

                                                                    <span>&times;</span>

                                                                </button>

                                                            </div>


                                                            <!-- ================================= -->
                                                            <!-- EDIT BODY -->
                                                            <!-- ================================= -->

                                                            <div class="modal-body">


                                                                <!-- NAME -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Name

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <input
                                                                        type="text"
                                                                        name="name"
                                                                        class="form-control"
                                                                        value="{{ $testimonial->name }}"
                                                                        placeholder="Enter name"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- DESCRIPTION -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Description

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <textarea
                                                                        name="description"
                                                                        class="form-control"
                                                                        rows="4"
                                                                        maxlength="255"
                                                                        placeholder="Enter testimonial description"
                                                                        required
                                                                    >{{ $testimonial->description }}</textarea>


                                                                    <small class="text-muted">

                                                                        Maximum 255 characters.

                                                                    </small>

                                                                </div>


                                                                <!-- OCCUPATION -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Occupation

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <input
                                                                        type="text"
                                                                        name="occupations"
                                                                        class="form-control"
                                                                        value="{{ $testimonial->occupations }}"
                                                                        placeholder="Enter occupation"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- CURRENT IMAGE -->

                                                                @if($testimonial->image)

                                                                    <div class="form-group">

                                                                        <label>
                                                                            Current Image
                                                                        </label>


                                                                        <div>

                                                                            <img
                                                                                src="{{ asset($testimonial->image) }}"
                                                                                width="120"
                                                                                height="120"
                                                                                style="object-fit:cover;"
                                                                                class="border rounded"
                                                                                alt="Current Image"
                                                                            >

                                                                        </div>

                                                                    </div>

                                                                @endif


                                                                <!-- NEW IMAGE -->

                                                                <div class="form-group">

                                                                    <label>
                                                                        Change Image
                                                                    </label>


                                                                    <input
                                                                        type="file"
                                                                        name="image"
                                                                        class="form-control"
                                                                        accept=".jpg,.jpeg,.png,.webp"
                                                                    >


                                                                    <small class="text-muted">

                                                                        Leave empty to keep the current image.

                                                                        Allowed:
                                                                        JPG, JPEG, PNG, WEBP.

                                                                        Maximum 10 MB.

                                                                    </small>

                                                                </div>


                                                            </div>


                                                            <!-- ================================= -->
                                                            <!-- EDIT FOOTER -->
                                                            <!-- ================================= -->

                                                            <div class="modal-footer">


                                                                <button
                                                                    type="button"
                                                                    class="btn btn-secondary"
                                                                    data-dismiss="modal"
                                                                >

                                                                    Close

                                                                </button>


                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-primary"
                                                                >

                                                                    <i class="fas fa-save"></i>

                                                                    Update Testimonial

                                                                </button>


                                                            </div>


                                                        </div>

                                                    </form>

                                                </div>

                                            </div>



                                            <!-- ===================================================== -->
                                            <!-- DELETE CONFIRMATION MODAL -->
                                            <!-- ===================================================== -->

                                            <div
                                                class="modal fade"
                                                id="deleteTestimonialModal{{ $testimonial->id }}"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="deleteTestimonialModalLabel{{ $testimonial->id }}"
                                                aria-hidden="true"
                                            >

                                                <div
                                                    class="modal-dialog"
                                                    role="document"
                                                >


                                                    <form
                                                        action="{{ route('testimonials.destroy', $testimonial->id) }}"
                                                        method="POST"
                                                    >

                                                        @csrf

                                                        @method('DELETE')


                                                        <div class="modal-content">


                                                            <!-- DELETE HEADER -->

                                                            <div class="modal-header">

                                                                <h5
                                                                    class="modal-title text-danger"
                                                                    id="deleteTestimonialModalLabel{{ $testimonial->id }}"
                                                                >

                                                                    <i class="fas fa-trash"></i>

                                                                    Delete Testimonial

                                                                </h5>


                                                                <button
                                                                    type="button"
                                                                    class="close"
                                                                    data-dismiss="modal"
                                                                >

                                                                    <span>&times;</span>

                                                                </button>

                                                            </div>


                                                            <!-- DELETE BODY -->

                                                            <div class="modal-body">


                                                                <p class="mb-2">

                                                                    Are you sure you want to delete this testimonial?

                                                                </p>


                                                                <div class="alert alert-warning">

                                                                    <strong>
                                                                        {{ $testimonial->name }}
                                                                    </strong>

                                                                    <br>

                                                                    This action cannot be undone.

                                                                </div>


                                                            </div>


                                                            <!-- DELETE FOOTER -->

                                                            <div class="modal-footer">


                                                                <button
                                                                    type="button"
                                                                    class="btn btn-secondary"
                                                                    data-dismiss="modal"
                                                                >

                                                                    Cancel

                                                                </button>


                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-danger"
                                                                >

                                                                    <i class="fas fa-trash"></i>

                                                                    Delete

                                                                </button>


                                                            </div>


                                                        </div>

                                                    </form>

                                                </div>

                                            </div>


                                        @empty


                                            <!-- ================================= -->
                                            <!-- NO RECORDS -->
                                            <!-- ================================= -->

                                            <tr>

                                                <td
                                                    colspan="6"
                                                    class="text-center text-muted"
                                                >

                                                    <i class="fas fa-comments"></i>

                                                    No testimonials found.

                                                </td>

                                            </tr>


                                        @endforelse


                                    </tbody>

                                </table>

                            </div>

                        </div>


                        <!-- ================================================= -->
                        <!-- CARD FOOTER -->
                        <!-- ================================================= -->

                        <div class="card-footer clearfix">

                            <span class="text-muted">

                                Total Testimonials:
                                {{ $testimonials->count() }}

                            </span>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- ========================================================= -->
<!-- ADD NEW TESTIMONIAL MODAL -->
<!-- ========================================================= -->

<div
    class="modal fade"
    id="newTestimonialModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newTestimonialModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >


        <form
            action="{{ route('testimonials.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="modal-content">


                <!-- ================================================= -->
                <!-- MODAL HEADER -->
                <!-- ================================================= -->

                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="newTestimonialModalLabel"
                    >

                        <i class="fas fa-plus"></i>

                        Add New Testimonial

                    </h5>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>&times;</span>

                    </button>

                </div>



                <!-- ================================================= -->
                <!-- MODAL BODY -->
                <!-- ================================================= -->

                <div class="modal-body">


                    <!-- NAME -->

                    <div class="form-group">

                        <label>

                            Name

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="Enter name"
                            maxlength="255"
                            required
                        >

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="form-group">

                        <label>

                            Description

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <textarea
                            name="description"
                            class="form-control"
                            rows="4"
                            maxlength="255"
                            placeholder="Enter testimonial description"
                            required
                        >{{ old('description') }}</textarea>


                        <small class="text-muted">

                            Maximum 255 characters.

                        </small>

                    </div>


                    <!-- OCCUPATION -->

                    <div class="form-group">

                        <label>

                            Occupation

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="occupations"
                            class="form-control"
                            value="{{ old('occupations') }}"
                            placeholder="Enter occupation"
                            maxlength="255"
                            required
                        >

                    </div>


                    <!-- IMAGE -->

                    <div class="form-group">

                        <label>
                            Image
                        </label>


                        <input
                            type="file"
                            name="image"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >


                        <small class="text-muted">

                            Allowed:
                            JPG, JPEG, PNG, WEBP.

                            Maximum 10 MB.

                        </small>

                    </div>


                </div>



                <!-- ================================================= -->
                <!-- MODAL FOOTER -->
                <!-- ================================================= -->

                <div class="modal-footer">


                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >

                        Close

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="fas fa-save"></i>

                        Save Testimonial

                    </button>


                </div>


            </div>

        </form>

    </div>

</div>


@endsection