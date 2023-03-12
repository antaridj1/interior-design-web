@extends('layout.user.app')

@section('content')

    @include('layout.user.header')

    <main id="main">
        <section id="contact" class="contact">
            <div class="container">
                <div class="row d-flex justify-content-center" data-aos="fade-up">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('profile.updateUser') }}" role="form" class="php-email-form">
                            @csrf
                            @method('patch')
                            <h2 class="text-start">Edit Profile</h2>
                            <div class="form-group mt-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" id="name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="yourEmail" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" id="yourEmail" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="yourEmail" class="form-label">No Telp</label>
                                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ $user->phone_number }}" id="yourphone_number" required>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="yourPassword" class="form-label">Password (Kosongi jika tidak ingin mengganti password)</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-2 my-5">
                                <button class="btn btn-primary w-100" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
        
                </div>
            </div>
        </section>
        @if(session()->has('status'))
        @include('layout.alert')
      @endif
        @include('layout.user.footer')
    </main>


@endsection
    
