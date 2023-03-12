@extends('layout.app')
@section('title','Semara Interior')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Tipe Interior</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('employee.typeInterior.index')}}">Tipe Interior</a></li>
            <li class="breadcrumb-item active">Tambah Tipe Interior</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Tipe Interior</h5>

              <!-- Floating Labels Form -->
              <form method="post" action="{{route('employee.typeInterior.store')}}" class="row g-3">
                @csrf
                <div class="row mb-3"> 
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10"> 
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ @old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3"> 
                  <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                  <div class="col-sm-10"> 
                      <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ @old('description') }}" required></textarea>
                      @error('description')
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
  