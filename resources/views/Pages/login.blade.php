@extends('Layouts.loginBefore')

@section('title','Login')

@section('container')
<div class="container py-2">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <b>Oops!</b> Email atau password salah.
                            </div>
                        @endif
                        <form action="{{ route('actionlogin') }}" method="post">
                            @csrf
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <span class="h1 fw-bold mb-0">Dashboard Sales</span>
                            </div>
                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your admin account</h5>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                <div id="emailHelp" class="form-text">email : user@gmail.com</div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                <div id="passwordHelp" class="form-text">Password : user</div>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </div>

                            <a class="small text-muted" href="#!">Forgot password?</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection