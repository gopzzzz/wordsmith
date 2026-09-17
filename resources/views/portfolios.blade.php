@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

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
                        Portfolio List
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

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th width="60">#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th width="120">Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($portfolios as $portfolio)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>


                                        <td>

                                            @if($portfolio->image)

                                                <img src="{{ asset('uploads/' . $portfolio->image) }}"
                                                     width="130"
                                                     height="80"
                                                     style="object-fit:cover;border-radius:5px;">

                                            @else

                                                No Image

                                            @endif

                                        </td>


                                        <td>
                                            {{ $portfolio->name }}
                                        </td>


                                        <td>

                                            <button type="button"
                                                    class="btn btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#editPortfolio{{ $portfolio->id }}">

                                                <i class="fas fa-edit"></i>

                                            </button>


                                            <a href="{{ route('portfolio.delete', $portfolio->id) }}"
                                               class="btn btn-sm btn-primary"
                                               onclick="return confirm('Are you sure you want to delete this portfolio?')">

                                                <i class="fas fa-trash"></i>

                                            </a>

                                        </td>

                                    </tr>


                                    <!-- EDIT MODAL -->

                                    <div class="modal fade"
                                         id="editPortfolio{{ $portfolio->id }}">

                                        <div class="modal-dialog">

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


                                                        <div class="form-group">

                                                            <label>
                                                                Image
                                                            </label>

                                                            <input type="file"
                                                                   name="image"
                                                                   class="form-control"
                                                                   accept="image/*">


                                                            @if($portfolio->image)

                                                                <div class="mt-2">

                                                                    <img src="{{ asset('uploads/' . $portfolio->image) }}"
                                                                         width="180"
                                                                         height="100"
                                                                         style="object-fit:cover;border-radius:5px;">

                                                                </div>

                                                            @endif

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

                                                            Update Portfolio

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                @empty

                                    <tr>

                                        <td colspan="4"
                                            class="text-center">

                                            No portfolios found.

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


<!-- ADD PORTFOLIO MODAL -->

<div class="modal fade"
     id="addPortfolioModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="{{ route('portfolio.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

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


                <div class="modal-body">

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


                    <div class="form-group">

                        <label>
                            Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*"
                               required>

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
                        Save Portfolio

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection