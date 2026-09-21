@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Blogs</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Blogs
                        </li>

                    </ol>

                </div>

            </div>

        </div>
    </section>


    <!-- Main Content -->
    <section class="content">

        <div class="container-fluid">


            <!-- Success Message -->
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        &times;

                    </button>

                    <i class="fas fa-check-circle"></i>

                    {{ session('success') }}

                </div>

            @endif


            <!-- Error Messages -->
            @if($errors->any())

                <div class="alert alert-danger alert-dismissible fade show">

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        &times;

                    </button>

                    <strong>

                        <i class="fas fa-exclamation-triangle"></i>

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



            <!-- Blog List -->
            <div class="card">


                <!-- Card Header -->
                <div class="card-header">

                    <h3 class="card-title">
                        Blog List
                    </h3>


                    <div class="card-tools">

                        <button type="button"
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#addBlogModal">

                            <i class="fas fa-plus"></i>

                            Add Blog

                        </button>

                    </div>

                </div>



                <!-- Card Body -->
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th style="width: 5%;">
                                        #
                                    </th>

                                    <th style="width: 20%;">
                                        Image
                                    </th>

                                    <th>
                                        Name
                                    </th>

                                    <th style="width: 15%;">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @forelse($blogs as $key => $blog)

                                    <tr>


                                        <!-- Number -->
                                        <td>

                                            {{ $key + 1 }}

                                        </td>



                                        <!-- Image -->
                                        <td>

                                            @if($blog->image)

                                                <img src="{{ asset($blog->image) }}"
                                                     alt="{{ $blog->name }}"
                                                     width="90"
                                                     height="60"
                                                     style="
                                                        object-fit: cover;
                                                        border-radius: 5px;
                                                        cursor: pointer;
                                                        border: 1px solid #ddd;
                                                     "
                                                     onclick="showImage('{{ asset($blog->image) }}')">

                                            @else

                                                <span class="text-muted">
                                                    No Image
                                                </span>

                                            @endif

                                        </td>



                                        <!-- Name -->
                                        <td>

                                            {{ $blog->name }}

                                        </td>



                                        <!-- Action -->
                                        <td>

                                            <button type="button"
                                                    class="btn btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#editBlogModal{{ $blog->id }}">

                                                <i class="fas fa-edit"></i>

                                                Edit

                                            </button>

                                        </td>


                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            class="text-center">

                                            <i class="fas fa-info-circle"></i>

                                            No blogs found.

                                        </td>

                                    </tr>

                                @endforelse


                            </tbody>

                        </table>

                    </div>

                </div>



                <!-- Footer -->
                <div class="card-footer">

                    <strong>
                        Total Blogs:
                    </strong>

                    {{ $blogs->count() }}

                </div>

            </div>

        </div>

    </section>

</div>



<!-- ========================================================= -->
<!-- ADD BLOG MODAL -->
<!-- ========================================================= -->

<div class="modal fade"
     id="addBlogModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="addBlogModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg"
         role="document">

        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">

                <h5 class="modal-title"
                    id="addBlogModalLabel">

                    <i class="fas fa-plus-circle"></i>

                    Add Blog

                </h5>


                <button type="button"
                        class="close"
                        data-dismiss="modal">

                    <span aria-hidden="true">
                        &times;
                    </span>

                </button>

            </div>



            <!-- Form -->
            <form action="{{ route('blogs.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <div class="modal-body">


                    <!-- Blog Name -->
                    <div class="form-group">

                        <label>

                            Name

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Enter blog name"
                               value="{{ old('name') }}"
                               required>

                    </div>



                    <!-- Description -->
                    <div class="form-group">

                        <label>
                            Description
                        </label>


                        <textarea name="description"
                                  class="form-control"
                                  rows="10"
                                  placeholder="Enter blog content">{{ old('description') }}</textarea>


                        <small class="form-text text-muted">

                            Long-form content is allowed.

                        </small>

                    </div>



                    <!-- Image -->
                    <div class="form-group">

                        <label>

                            Image

                            <span class="text-muted font-weight-normal ml-1">

                                (Optional)

                            </span>

                        </label>


                        <input type="file"
                               name="image"
                               id="addBlogImage"
                               class="form-control"
                               accept="image/jpeg,image/jpg,image/png,image/webp"
                               onchange="previewAddImage(event)">


                        <small class="form-text text-muted">

                            Allowed: JPG, JPEG, PNG, WEBP.

                            Maximum size: 10 MB.

                        </small>

                    </div>



                    <!-- Add Image Preview -->
                    <div class="form-group"
                         id="addImagePreviewContainer"
                         style="display:none;">

                        <label>
                            Image Preview
                        </label>

                        <br>


                        <img id="addImagePreview"
                             src=""
                             alt="Image Preview"
                             style="
                                max-width:250px;
                                max-height:180px;
                                object-fit:cover;
                                border-radius:5px;
                                border:1px solid #ddd;
                                padding:3px;
                             ">

                    </div>


                </div>



                <!-- Modal Footer -->
                <div class="modal-footer">


                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>

                        Close

                    </button>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        Save Blog

                    </button>


                </div>


            </form>

        </div>

    </div>

</div>



<!-- ========================================================= -->
<!-- EDIT BLOG MODALS -->
<!-- ========================================================= -->

@foreach($blogs as $blog)

<div class="modal fade"
     id="editBlogModal{{ $blog->id }}"
     tabindex="-1"
     role="dialog"
     aria-labelledby="editBlogModalLabel{{ $blog->id }}"
     aria-hidden="true">

    <div class="modal-dialog modal-lg"
         role="document">

        <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">

                <h5 class="modal-title"
                    id="editBlogModalLabel{{ $blog->id }}">

                    <i class="fas fa-edit"></i>

                    Edit Blog

                </h5>


                <button type="button"
                        class="close"
                        data-dismiss="modal">

                    <span aria-hidden="true">
                        &times;
                    </span>

                </button>

            </div>



            <!-- Edit Form -->
            <form action="{{ route('blogs.update', $blog->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <div class="modal-body">


                    <!-- Blog Name -->
                    <div class="form-group">

                        <label>

                            Name

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ $blog->name }}"
                               placeholder="Enter blog name"
                               required>

                    </div>



                    <!-- Description -->
                    <div class="form-group">

                        <label>
                            Description
                        </label>


                        <textarea name="description"
                                  class="form-control"
                                  rows="10"
                                  placeholder="Enter blog content">{{ $blog->description }}</textarea>


                        <small class="form-text text-muted">

                            Long-form content is allowed.

                        </small>

                    </div>



                    <!-- Current Image -->
                    <div class="form-group">

                        <label>
                            Current Image
                        </label>

                        <br>


                        @if($blog->image)

                            <img src="{{ asset($blog->image) }}"
                                 alt="{{ $blog->name }}"
                                 width="180"
                                 height="120"
                                 style="
                                    object-fit:cover;
                                    border-radius:5px;
                                    border:1px solid #ddd;
                                    padding:3px;
                                    cursor:pointer;
                                 "
                                 onclick="showImage('{{ asset($blog->image) }}')">

                        @else

                            <p class="text-muted">

                                No image available

                            </p>

                        @endif

                    </div>



                    <!-- Change Image -->
                    <div class="form-group">

                        <label>

                            Change Image

                            <span class="text-muted font-weight-normal ml-1">

                                (Optional)

                            </span>

                        </label>


                        <input type="file"
                               name="image"
                               id="editBlogImage{{ $blog->id }}"
                               class="form-control"
                               accept="image/jpeg,image/jpg,image/png,image/webp"
                               onchange="previewEditImage(event, {{ $blog->id }})">


                        <small class="form-text text-muted">

                            Leave empty to keep the current image.

                            Allowed: JPG, JPEG, PNG, WEBP.

                            Maximum size: 10 MB.

                        </small>

                    </div>



                    <!-- New Image Preview -->
                    <div class="form-group"
                         id="editImagePreviewContainer{{ $blog->id }}"
                         style="display:none;">

                        <label>
                            New Image Preview
                        </label>

                        <br>


                        <img id="editImagePreview{{ $blog->id }}"
                             src=""
                             alt="New Image Preview"
                             style="
                                max-width:250px;
                                max-height:180px;
                                object-fit:cover;
                                border-radius:5px;
                                border:1px solid #ddd;
                                padding:3px;
                             ">

                    </div>


                </div>



                <!-- Modal Footer -->
                <div class="modal-footer">


                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>

                        Close

                    </button>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        Update Blog

                    </button>


                </div>


            </form>

        </div>

    </div>

</div>

@endforeach



<!-- ========================================================= -->
<!-- IMAGE VIEW MODAL -->
<!-- ========================================================= -->

<div class="modal fade"
     id="imageViewModal"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg"
         role="document">

        <div class="modal-content">


            <!-- Header -->
            <div class="modal-header">

                <h5 class="modal-title">

                    Blog Image

                </h5>


                <button type="button"
                        class="close"
                        data-dismiss="modal">

                    <span>
                        &times;
                    </span>

                </button>

            </div>



            <!-- Image -->
            <div class="modal-body text-center">

                <img id="largeBlogImage"
                     src=""
                     alt="Blog Image"
                     style="
                        max-width:100%;
                        max-height:600px;
                        object-fit:contain;
                     ">

            </div>


        </div>

    </div>

</div>



<!-- ========================================================= -->
<!-- JAVASCRIPT -->
<!-- ========================================================= -->

<script>


/*
|--------------------------------------------------------------------------
| ADD IMAGE PREVIEW
|--------------------------------------------------------------------------
*/

function previewAddImage(event)
{

    const file = event.target.files[0];


    const container =
        document.getElementById(
            'addImagePreviewContainer'
        );


    if (!file) {

        container.style.display = 'none';

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Allowed File Types
    |--------------------------------------------------------------------------
    */

    const allowedTypes = [

        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp'

    ];


    if (!allowedTypes.includes(file.type)) {

        alert(
            'Please select a JPG, JPEG, PNG or WEBP image.'
        );


        event.target.value = '';


        container.style.display = 'none';


        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Maximum 10 MB
    |--------------------------------------------------------------------------
    */

    if (file.size > 10 * 1024 * 1024) {

        alert(
            'Image size must be 10 MB or less.'
        );


        event.target.value = '';


        container.style.display = 'none';


        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Preview
    |--------------------------------------------------------------------------
    */

    const reader = new FileReader();


    reader.onload = function(e)
    {

        document.getElementById(
            'addImagePreview'
        ).src = e.target.result;


        container.style.display = 'block';

    };


    reader.readAsDataURL(file);

}



/*
|--------------------------------------------------------------------------
| EDIT IMAGE PREVIEW
|--------------------------------------------------------------------------
*/

function previewEditImage(event, blogId)
{

    const file =
        event.target.files[0];


    const container =
        document.getElementById(
            'editImagePreviewContainer' + blogId
        );


    const preview =
        document.getElementById(
            'editImagePreview' + blogId
        );


    if (!file) {

        container.style.display = 'none';

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Allowed File Types
    |--------------------------------------------------------------------------
    */

    const allowedTypes = [

        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp'

    ];


    if (!allowedTypes.includes(file.type)) {

        alert(
            'Please select a JPG, JPEG, PNG or WEBP image.'
        );


        event.target.value = '';


        container.style.display = 'none';


        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Maximum 10 MB
    |--------------------------------------------------------------------------
    */

    if (file.size > 10 * 1024 * 1024) {

        alert(
            'Image size must be 10 MB or less.'
        );


        event.target.value = '';


        container.style.display = 'none';


        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Preview
    |--------------------------------------------------------------------------
    */

    const reader = new FileReader();


    reader.onload = function(e)
    {

        preview.src = e.target.result;


        container.style.display = 'block';

    };


    reader.readAsDataURL(file);

}



/*
|--------------------------------------------------------------------------
| SHOW LARGE IMAGE
|--------------------------------------------------------------------------
*/

function showImage(imageUrl)
{

    document.getElementById(
        'largeBlogImage'
    ).src = imageUrl;


    $('#imageViewModal').modal('show');

}

</script>


@endsection