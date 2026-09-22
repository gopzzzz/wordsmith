@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- CONTENT HEADER -->
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Services</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Services
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- CONTENT -->
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

                <div class="alert alert-danger alert-dismissible fade show">

                    <strong>Please fix the following errors:</strong>

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                    <button type="button"
                            class="close"
                            data-dismiss="alert">

                        &times;

                    </button>

                </div>

            @endif


            <!-- SERVICES CARD -->
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Services List
                    </h3>


                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addServiceModal">

                        <i class="fas fa-plus"></i>
                        Add Service

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="60">
                                        #
                                    </th>

                                    <th width="120">
                                        Icon
                                    </th>

                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Description
                                    </th>

                                    <th width="120">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($services as $service)

                                    <tr>

                                        <!-- NUMBER -->
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>


                                        <!-- IMAGE -->
                                        <td class="text-center">

                                            @if($service->icon)

                                                <img
                                                    src="{{ asset($service->icon) }}"
                                                    alt="Service Icon"
                                                    style="
                                                        width:70px;
                                                        height:70px;
                                                        object-fit:contain;
                                                        border-radius:8px;
                                                        border:1px solid #ddd;
                                                        padding:5px;
                                                    "
                                                >

                                            @else

                                                <span class="text-muted">
                                                    No Image
                                                </span>

                                            @endif

                                        </td>


                                        <!-- NAME -->
                                        <td>
                                            {{ $service->name }}
                                        </td>


                                        <!-- DESCRIPTION -->
                                        <td>
                                            {{ $service->description }}
                                        </td>


                                        <!-- ACTION -->
                                        <td>

                                            <!-- EDIT -->
                                            <button type="button"
                                                    class="btn btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#editService{{ $service->id }}">

                                                <i class="fas fa-edit"></i>

                                            </button>


                                            <!-- DELETE -->
                                            <a href="{{ route('services.delete', $service->id) }}"
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Are you sure you want to delete this service?')">

                                                <i class="fas fa-trash"></i>

                                            </a>

                                        </td>

                                    </tr>


                                    <!-- ============================== -->
                                    <!-- EDIT SERVICE MODAL -->
                                    <!-- ============================== -->

                                    <div class="modal fade"
                                         id="editService{{ $service->id }}"
                                         tabindex="-1"
                                         role="dialog">

                                        <div class="modal-dialog modal-lg"
                                             role="document">

                                            <div class="modal-content">


                                                <form action="{{ route('services.update', $service->id) }}"
                                                      method="POST"
                                                      enctype="multipart/form-data">

                                                    @csrf


                                                    <!-- MODAL HEADER -->
                                                    <div class="modal-header">

                                                        <h4 class="modal-title">
                                                            Edit Service
                                                        </h4>


                                                        <button type="button"
                                                                class="close"
                                                                data-dismiss="modal">

                                                            &times;

                                                        </button>

                                                    </div>


                                                    <!-- MODAL BODY -->
                                                    <div class="modal-body">


                                                        <!-- CURRENT IMAGE -->
                                                        <div class="form-group">

                                                            <label>
                                                                Current Icon
                                                            </label>


                                                            @if($service->icon)

                                                                <div class="mb-3">

                                                                    <img
                                                                        src="{{ asset($service->icon) }}"
                                                                        alt="Current Icon"
                                                                        style="
                                                                            width:100px;
                                                                            height:100px;
                                                                            object-fit:contain;
                                                                            border:1px solid #ddd;
                                                                            border-radius:8px;
                                                                            padding:5px;
                                                                        "
                                                                    >

                                                                </div>

                                                            @else

                                                                <p class="text-muted">
                                                                    No icon uploaded.
                                                                </p>

                                                            @endif

                                                        </div>


                                                        <!-- NEW IMAGE -->
                                                        <div class="form-group">

                                                            <label>
                                                                Change Icon
                                                            </label>

                                                            <input
                                                                type="file"
                                                                name="icon"
                                                                class="form-control"
                                                                accept="image/jpeg,image/png,image/webp"
                                                                onchange="previewEditImage(this, {{ $service->id }})"
                                                            >


                                                            <small class="text-muted">

                                                                Optional. Leave empty to keep the current icon.
                                                                Maximum size: 10 MB.

                                                            </small>


                                                            <!-- PREVIEW -->
                                                            <div class="mt-3">

                                                                <img
                                                                    id="editPreview{{ $service->id }}"
                                                                    src=""
                                                                    alt="New Icon Preview"
                                                                    style="
                                                                        display:none;
                                                                        width:100px;
                                                                        height:100px;
                                                                        object-fit:contain;
                                                                        border:1px solid #ddd;
                                                                        border-radius:8px;
                                                                        padding:5px;
                                                                    "
                                                                >

                                                            </div>

                                                        </div>


                                                        <!-- NAME -->
                                                        <div class="form-group">

                                                            <label>
                                                                Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                name="name"
                                                                class="form-control"
                                                                value="{{ $service->name }}"
                                                                required
                                                            >

                                                        </div>


                                                        <!-- DESCRIPTION -->
                                                        <div class="form-group">

                                                            <label>
                                                                Description
                                                            </label>

                                                            <textarea
                                                                name="description"
                                                                class="form-control"
                                                                rows="4"
                                                                required
                                                            >{{ $service->description }}</textarea>

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

                                                            Update Service

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>


                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center">

                                            No services found.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<!-- ====================================================== -->
<!-- ADD SERVICE MODAL -->
<!-- ====================================================== -->

<div class="modal fade"
     id="addServiceModal"
     tabindex="-1"
     role="dialog">

    <div class="modal-dialog modal-lg"
         role="document">

        <div class="modal-content">


            <form action="{{ route('services.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <!-- HEADER -->
                <div class="modal-header">

                    <h4 class="modal-title">
                        Add Service
                    </h4>


                    <button type="button"
                            class="close"
                            data-dismiss="modal">

                        &times;

                    </button>

                </div>


                <!-- BODY -->
                <div class="modal-body">


                    <!-- ICON IMAGE -->
                    <div class="form-group">

                        <label>
                            Icon
                        </label>


                        <input
                            type="file"
                            name="icon"
                            id="serviceIcon"
                            class="form-control"
                            accept="image/jpeg,image/png,image/webp"
                            required
                            onchange="previewServiceImage(this)"
                        >


                        <small class="text-muted">

                            Upload service icon image.
                            JPG, JPEG, PNG or WEBP.
                            Maximum size: 10 MB.

                        </small>


                        <!-- IMAGE PREVIEW -->
                        <div class="mt-3">

                            <img
                                id="serviceIconPreview"
                                src=""
                                alt="Icon Preview"
                                style="
                                    display:none;
                                    width:120px;
                                    height:120px;
                                    object-fit:contain;
                                    border:1px solid #ddd;
                                    border-radius:8px;
                                    padding:5px;
                                "
                            >

                        </div>

                    </div>


                    <!-- NAME -->
                    <div class="form-group">

                        <label>
                            Name
                        </label>


                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter service name"
                            required
                        >

                    </div>


                    <!-- DESCRIPTION -->
                    <div class="form-group">

                        <label>
                            Description
                        </label>


                        <textarea
                            name="description"
                            class="form-control"
                            rows="4"
                            placeholder="Enter service description"
                            required
                        ></textarea>

                    </div>

                </div>


                <!-- FOOTER -->
                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                        Close

                    </button>


                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        Save Service

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- ====================================================== -->
<!-- IMAGE PREVIEW JAVASCRIPT -->
<!-- ====================================================== -->

<script>

function previewServiceImage(input)
{
    const preview = document.getElementById('serviceIconPreview');

    if (input.files && input.files[0]) {

        const reader = new FileReader();

        reader.onload = function(e) {

            preview.src = e.target.result;

            preview.style.display = 'block';

        };

        reader.readAsDataURL(input.files[0]);

    } else {

        preview.src = '';

        preview.style.display = 'none';

    }
}


function previewEditImage(input, id)
{
    const preview = document.getElementById('editPreview' + id);

    if (input.files && input.files[0]) {

        const reader = new FileReader();

        reader.onload = function(e) {

            preview.src = e.target.result;

            preview.style.display = 'block';

        };

        reader.readAsDataURL(input.files[0]);

    } else {

        preview.src = '';

        preview.style.display = 'none';

    }
}

</script>


@endsection