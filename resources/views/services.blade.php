@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

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

                                    <th width="60">#</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th width="120">Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($services as $service)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>


                                        <td>

                                            <i class="{{ $service->icon }}"
                                               style="font-size:25px;">
                                            </i>

                                            <br>

                                            <small class="text-muted">
                                                {{ $service->icon }}
                                            </small>

                                        </td>


                                        <td>
                                            {{ $service->name }}
                                        </td>


                                        <td>
                                            {{ $service->description }}
                                        </td>


                                        <td>

                                            <button type="button"
                                                    class="btn btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#editService{{ $service->id }}">

                                                <i class="fas fa-edit"></i>

                                            </button>


                                            <a href="{{ route('services.delete', $service->id) }}"
                                               class="btn btn-sm btn-primary"
                                               onclick="return confirm('Are you sure you want to delete this service?')">

                                                <i class="fas fa-trash"></i>

                                            </a>

                                        </td>

                                    </tr>


                                    <!-- EDIT MODAL -->

                                    <div class="modal fade"
                                         id="editService{{ $service->id }}">

                                        <div class="modal-dialog modal-lg">

                                            <div class="modal-content">

                                                <form action="{{ route('services.update', $service->id) }}"
                                                      method="POST">

                                                    @csrf

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


                                                    <div class="modal-body">

                                                        <div class="form-group">

                                                            <label>
                                                                Icon
                                                            </label>

                                                            <input type="text"
                                                                   name="icon"
                                                                   class="form-control"
                                                                   value="{{ $service->icon }}"
                                                                   placeholder="Example: fas fa-home"
                                                                   required>

                                                        </div>


                                                        <div class="form-group">

                                                            <label>
                                                                Name
                                                            </label>

                                                            <input type="text"
                                                                   name="name"
                                                                   class="form-control"
                                                                   value="{{ $service->name }}"
                                                                   required>

                                                        </div>


                                                        <div class="form-group">

                                                            <label>
                                                                Description
                                                            </label>

                                                            <textarea name="description"
                                                                      class="form-control"
                                                                      rows="4"
                                                                      required>{{ $service->description }}</textarea>

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


<!-- ADD SERVICE MODAL -->

<div class="modal fade"
     id="addServiceModal">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="{{ route('services.store') }}"
                  method="POST">

                @csrf

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


                <div class="modal-body">

                    <div class="form-group">

                        <label>
                            Icon
                        </label>

                        <input type="text"
                               name="icon"
                               class="form-control"
                               placeholder="Example: fas fa-home"
                               required>

                        <small class="text-muted">
                            Example: fas fa-home, fas fa-cog, fas fa-users
                        </small>

                    </div>


                    <div class="form-group">

                        <label>
                            Name
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Enter service name"
                               required>

                    </div>


                    <div class="form-group">

                        <label>
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Enter service description"
                                  required></textarea>

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
                        Save Service

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection