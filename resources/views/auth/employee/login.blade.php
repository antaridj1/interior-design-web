@extends('layout.app')
@section('title','Login | Semara Interior')

@section('container')
<section class=" container-fluid">
    <div class="row d-flex justify-content-between vh-100 p-0 m-0" style="overflow: hidden">
        <div class="col-lg-6 d-flex flex-column align-items-center justify-content-center">
            <img src="{{asset('asset/img/login.svg')}}" width="85%" alt="">
        </div>
        <div class="col-lg-6 h-100 d-flex align-items-center justify-content-center" style="background-color: white;" >
            <div class="col-8 ">
                <a href="index.html" class=" d-flex align-items-center justify-content-center">
                    <img src="{{asset('assets/img/logo.png')}}" width="70px" height="70px" alt="">
                </a>
                <div class="pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Masuk ke Akun</h5>
                </div>
                <form method="POST" action="{{ route('employee.login') }}" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-12">
                        <label for="yourEmail" class="form-label">Email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="yourEmail" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- @if (Route::has('password.request'))
                        <a class="small text-end" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                    @endif --}}
                    <div class="col-12">
                        {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div> --}}
                    </div>
                    <div class="col-12 mb-5">
                        <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
    
                    {{-- <div class="col-12">
                        <p class="small mb-0">Don't have account? <a href="{{route('register')}}">Create an account</a></p>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
    
