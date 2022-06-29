@extends('layouts.auth')

@section('login')
<form action="{{ route('login') }}" method="post" class="form-login">
@csrf
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!-- End Logo --> 

              <div class="card mb-3">
                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                      <img src="{{ asset('NAdmin/assets/img/logo.png') }}" alt="">
                      <span class="d-none d-lg-block">{{ config ('app.name') }}</span>
                    </a>
                  </div>
                <div class="card-body">
                  <form class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="from-group input-group has-validation ">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourUsername" required value="{{ old('email') }}">                     
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
</form>
@endsection