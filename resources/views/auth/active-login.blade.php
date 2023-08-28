@extends('layout.login')

@section('content')

    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side ">

                        <p class=" text-white h2" style="font-family: 'Tajawal', sans-serif">welcome to Ramadia admin panel</p>

                        <p class="white mb-0" style="font-family: 'Tajawal', sans-serif">
                            please login
                        </p>
                    </div>
                    <div class="form-side">
                        {{-- <a href="/">
                            <span class="logo-single"></span>
                        </a> --}}
                        <h6 class="mb-4">تسجيل الدخول</h6>
                        <form method="POST" action="{{ URL('/login-active') }}">
                            @csrf
                            <label class="form-group has-float-label mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            </label>

                            <label class="form-group has-float-label mb-4">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            </label>
                            <div class="d-flex justify-content-between align-items-center">
                                {{-- <a href="#">Forget password?</a> --}}
                                <button class="btn btn-primary btn-lg btn-shadow" type="submit">تاكيد</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
