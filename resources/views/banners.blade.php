@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Banners</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Banners
                        </li>
                    </ol>
                </div>

            </div>

        </div>
    </section>


    <section class="content">

        <div class="container-fluid">

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


            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Banner List
                    </h3>

                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addBannerModal">

                        <i class="fas fa-plus"></i>
                        Add Banner

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>#</th>
                                    <th>Page Name</th>
                                    <th>Banner Image</th>
                                    <th>Main Title</th>
                                    <th>Subtitle</th>
                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($banners as $banner)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $banner->pagename }}
                                        </td>

                                        <td>

                                            @if($banner->bannerimage)

                                                <img src="{{ asset('uploads/' . $banner->bannerimage) }}"
                                                     width="130"
                                                     height="70"
                                                     style="object-fit:cover;border-radius:5px;">

                                            @else

                                                No Image

                                            @endif

                                        </td>

                                        <td>
                                            {{ $banner->maintitle }}
                                        </td>

                                        <td>
                                            {{ $banner->subtitle }}
                                        </td>

                                        <td>

                                            <button type="button"
                                                    class="btn btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#editBanner{{ $banner->id }}">

                                                <i class="fas fa-edit"></i>

                                            </button>


                                            <a href="{{ route('banners.delete', $banner->id) }}"
                                               class="btn btn-sm btn-primary"
                                               onclick="return confirm('Are you sure you want to delete this banner?')">

                                                <i class="fas fa-trash"></i>

                                            </a>

                                        </td>

                                    </tr>


                                    <!-- EDIT MODAL -->

                                    <div class="modal fade"
                                         id="editBanner{{ $banner->id }}">

                                        <div class="modal-dialog modal-lg">

                                            <div class="modal-content">

                                                <form action="{{ route('banners.update', $banner->id) }}"
                                                      method="POST"
                                                      enctype="multipart/form-data">

                                                    @csrf

                                                    <div class="modal-header">

                                                        <h4 class="modal-title">
                                                            Edit Banner
                                                        </h4>

                                                        <button type="button"
                                                                class="close"
                                                                data-dismiss="modal">

                                                            &times;

                                                        </button>

                                                    </div>


                                                    <div class="modal-body">

                                                        <div class="form-group">

                                                            <label>
                                                                Page Name
                                                            </label>

                                                            <input type="text"
                                                                   name="pagename"
                                                                   class="form-control"
                                                                   value="{{ $banner->pagename }}"
                                                                   required>

                                                        </div>


                                                        <div class="form-group">

                                                            <label>
                                                                Banner Image
                                                            </label>

                                                            <input type="file"
                                                                   name="bannerimage"
                                                                   class="form-control"
                                                                   accept="image/*">

                                                            @if($banner->bannerimage)

                                                                <div class="mt-2">

                                                                    <img src="{{ asset('uploads/' . $banner->bannerimage) }}"
                                                                         width="180"
                                                                         height="90"
                                                                         style="object-fit:cover;border-radius:5px;">

                                                                </div>

                                                            @endif

                                                        </div>


                                                        <div class="form-group">

                                                            <label>
                                                                Main Title
                                                            </label>

                                                            <input type="text"
                                                                   name="maintitle"
                                                                   class="form-control"
                                                                   value="{{ $banner->maintitle }}"
                                                                   required>

                                                        </div>


                                                        <div class="form-group">

                                                            <label>
                                                                Subtitle
                                                            </label>

                                                            <input type="text"
                                                                   name="subtitle"
                                                                   class="form-control"
                                                                   value="{{ $banner->subtitle }}">

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

                                                            Update Banner

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="text-center">

                                            No banners found.

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


<!-- ADD BANNER MODAL -->

<div class="modal fade"
     id="addBannerModal">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="{{ route('banners.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-header">

                    <h4 class="modal-title">
                        Add Banner
                    </h4>

                    <button type="button"
                            class="close"
                            data-dismiss="modal">

                        &times;

                    </button>

                </div>


                <div class="modal-body">

                    <div class="form-group">

                        <label>
                            Page Name
                        </label>

                        <input type="text"
                               name="pagename"
                               class="form-control"
                               placeholder="Enter page name"
                               required>

                    </div>


                    <div class="form-group">

                        <label>
                            Banner Image
                        </label>

                        <input type="file"
                               name="bannerimage"
                               class="form-control"
                               accept="image/*"
                               required>

                    </div>


                    <div class="form-group">

                        <label>
                            Main Title
                        </label>

                        <input type="text"
                               name="maintitle"
                               class="form-control"
                               placeholder="Enter main title"
                               required>

                    </div>


                    <div class="form-group">

                        <label>
                            Subtitle
                        </label>

                        <input type="text"
                               name="subtitle"
                               class="form-control"
                               placeholder="Enter subtitle">

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
                        Save Banner

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection