@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Pegawai</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('pegawai.index')}}">Pegawai</a></li>
            <li class="breadcrumb-item active">Tambah Pegawai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Pegawai</h5>

              <!-- Floating Labels Form -->
              <form method="post" action="{{route('pegawai.store')}}" class="row g-3">
                @csrf
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="floatingPerihal" value="{{ @old('name') }}" required>
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
                      <input class="form-control @error('email') is-invalid @enderror" name="email" id="floatingPerihal" value="{{ @old('email') }}" required>
                      <label for="floatingPerihal">Email</label>
                      @error('email')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                      @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                      <input class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPerihal" value="{{ @old('password') }}">
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
  </main><!-- End #main -->
  @endsection