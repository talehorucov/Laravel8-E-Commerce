<!DOCTYPE html>
<html lang="az">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giriş</title>
    <link rel="shortcut icon" type="image/png"
        href="https://upload.wikimedia.org/wikipedia/commons/d/da/Font_Awesome_5_solid_book-reader.svg" />

    <link rel="stylesheet" href="/css/app.css">

</head>

<body>
    <section class="vh-100">
        <div class="container-fluid vh-100 h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">

                    <x-jet-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="form-control form-control-lg"
                                placeholder="Email Daxil Edin" required />
                            <label class="form-label">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password" class="form-control form-control-lg"
                                placeholder="Şifrə Daxil Edin" required />
                            <label class="form-label">Şifrə</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" name="remember" />
                                <label class="form-check-label" for="form2Example3">
                                    Məni Xatırla
                                </label>
                            </div>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                Daxil Ol
                            </button>
                        </div>
                    </form>

                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-body">Şifrəmi Unutdum</a>
                        @endif

                        <p class="small fw-bold mt-2 pt-1 mb-0">
                            Hesabın Yoxdu ?
                            <a href="{{ route('register') }}" class="link-danger">Qeydiyyat</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
