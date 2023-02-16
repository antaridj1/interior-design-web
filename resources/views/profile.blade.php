@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          @if(session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session()->get('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Edit</h5>

              <!-- Floating Labels Form -->
              <form method="post" action="{{route('profile.update')}}" class="row g-3">
                @csrf
                @method('patch')
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="floatingPerihal" value="{{ $user->name }}">
                    <label for="floatingPerihal">Nama</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="floatingPerihal" value="{{ $user->email }}">
                    <label for="floatingPerihal">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div> <div class="col-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPerihal">
                    <label for="floatingPerihal">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
      </div>
    </section>
    @if(session()->has('status'))
    @include('layout.alert')
  @endif
  </main><!-- End #main -->

@endsection