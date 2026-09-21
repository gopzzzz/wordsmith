@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Dashboard
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </section>


    <!-- Main Content -->
    <section class="content">

        <div class="container-fluid">

            <!-- Info Boxes -->
            <div class="row">

                <!-- CPU Traffic -->
                <div class="col-12 col-sm-6 col-md-3">

                    <div class="info-box">

                        <span class="info-box-icon bg-info elevation-1">
                            <i class="fas fa-cog"></i>
                        </span>

                        <div class="info-box-content">

                            <span class="info-box-text">
                                CPU Traffic
                            </span>

                            <span class="info-box-number">
                                10
                                <small>%</small>
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Likes -->
                <div class="col-12 col-sm-6 col-md-3">

                    <div class="info-box mb-3">

                        <span class="info-box-icon bg-danger elevation-1">
                            <i class="fas fa-thumbs-up"></i>
                        </span>

                        <div class="info-box-content">

                            <span class="info-box-text">
                                Likes
                            </span>

                            <span class="info-box-number">
                                41,410
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Fix for small devices -->
                <div class="clearfix hidden-md-up"></div>


                <!-- Sales -->
                <div class="col-12 col-sm-6 col-md-3">

                    <div class="info-box mb-3">

                        <span class="info-box-icon bg-success elevation-1">
                            <i class="fas fa-shopping-cart"></i>
                        </span>

                        <div class="info-box-content">

                            <span class="info-box-text">
                                Sales
                            </span>

                            <span class="info-box-number">
                                760
                            </span>

                        </div>

                    </div>

                </div>


                <!-- New Members -->
                <div class="col-12 col-sm-6 col-md-3">

                    <div class="info-box mb-3">

                        <span class="info-box-icon bg-warning elevation-1">
                            <i class="fas fa-users"></i>
                        </span>

                        <div class="info-box-content">

                            <span class="info-box-text">
                                New Members
                            </span>

                            <span class="info-box-number">
                                2,000
                            </span>

                        </div>

                    </div>

                </div>

            </div>
            <!-- /.row -->


            <!-- Additional dashboard content can be added here -->


        </div>

    </section>


    <!--
    |--------------------------------------------------------------------------
    | Prevent Chrome Back/Forward Cache
    |--------------------------------------------------------------------------
    -->
    <script>
        window.addEventListener('pageshow', function (event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>

</div>

@endsection