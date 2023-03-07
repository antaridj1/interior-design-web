@extends('layout.user.app')

@section('content')

    @include('layout.user.header')

    <main id="main">
        <section id="contact" class="contact">
            <div class="container">
                <div class="row d-flex justify-content-center" data-aos="fade-up">
                    <div class="col-lg-6">
                        <form method="POST" action="{{ route('register') }}" role="form" class="php-email-form">
                            @csrf
                            <h2 class="text-center">Registrasi</h2>
                            <div class="form-group mt-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="yourEmail" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="yourEmail" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="yourEmail" class="form-label">No Telp</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" id="yourphone_number" required>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 my-5">
                                <button class="btn btn-primary w-100" type="submit">Registrasi</button>
                            </div>
                            <div class="form-group my-3 d-flex justify-content-center">
                                <a class="small text-end" href="{{ route('login') }}">
                                    Sudah memiliki akun? Klik disini
                                </a>
                            </div>
                        </form>
                    </div>
        
                </div>
            </div>
        </section>

        @include('layout.user.footer')
    </main>


@endsection
    
