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
    <link rel="stylesheet" href="/css/app.css">
    <section style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-3">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-2">Qeydiyyat</p>

                                    <form class="mx-1 mx-md-4" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="name" class="form-control" required />
                                                <label class="form-label">Ad Soyad</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="email" class="form-control" required />
                                                <label class="form-label">Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password" class="form-control" required
                                                    autocomplete="new-password" />
                                                <label class="form-label">Şifrə</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-2">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password_confirmation"
                                                    class="form-control" required autocomplete="new-password" />
                                                <label class="form-label">Şifrə Təkrar</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Qeydiyyat</button>
                                        </div>

                                    </form>
                                    <div class="d-flex justify-content-center mx-4">
                                        <p class="small fw-bold mt-2 pt-1 mb-0">
                                            Hesabın Var ?
                                            <a href="{{ route('login') }}" class="link-danger">Daxil Ol</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
