<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.head')

<body class="hold-transition login-page">

<div class="login-box">

    <div class="login-logo">
        <a href="#">
            <b>Wordsmithabc</b>
        </a>
    </div>

    <!-- Login Card -->
    <div class="card">

        <div class="card-body login-card-body">

            <p class="login-box-msg">
                Sign in to start your session
            </p>

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="input-group mb-3">

                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email"
                        autocomplete="username"
                        required
                    >

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                </div>


                <!-- Password -->
                <div class="input-group mb-3">

                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Password"
                        autocomplete="current-password"
                        required
                    >

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>


                <div class="row">

                    <!-- Remember Me -->
                    <div class="col-8">

                        <div class="icheck-primary">

                            <input
                                type="checkbox"
                                id="remember"
                                name="remember"
                                value="1"
                            >

                            <label for="remember">
                                Remember Me
                            </label>

                        </div>

                    </div>


                    <!-- Sign In -->
                    <div class="col-4">

                        <button
                            type="submit"
                            class="btn btn-primary btn-block"
                        >
                            Sign In
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- Prevent browser history cache from restoring this page -->
<script>
    window.addEventListener('pageshow', function (event) {

        if (event.persisted) {
            window.location.reload();
        }

    });
</script>


@include('layouts.partials.footer-scripts')

</body>
</html>