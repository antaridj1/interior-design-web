@extends('layout.user.app')

@section('content')

    @include('layout.user.header')

    <main id="main" >
        <section id="contact" class="contact">
            <div class="container">
                <div class="row d-flex justify-content-center" data-aos="fade-up">
                    <div class="col-lg-6 mt-5">
                        <form method="POST" action="{{ route('login') }}" role="form" class="php-email-form">
                            @csrf
                            <h2 class="text-center">Login</h2>
                            <div class="form-group mt-3">
                                <label for="yourEmail" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="yourEmail" placeholder="Masukkan alamat email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" placeholder="Masukkan password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-3 d-flex justify-content-end">
                                @if (Route::has('password.request'))
                                    <a class="small text-end" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-12 mb-5">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
        @include('layout.user.footer')
    </main>
@include('layout.alert ')
@endsection
    
