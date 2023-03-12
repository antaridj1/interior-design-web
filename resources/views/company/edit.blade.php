@extends('layout.app')
@section('title','Semara Interior')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Company</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('employee/home')}}">Home</a></li>
                <li class="breadcrumb-item active">Edit Company</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form company</h5>

              <!-- Floating Labels Form -->
              <form method="post" action="{{route('employee.company.update',$company->id)}}" class="row g-3" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $company->name}}">
                    <label for="name">Nama Company</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                      <input class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ $company->address}}">
                      <label for="address">Alamat</label>
                      @error('address')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" value="{{ $company->telp}}">
                      <label for="telp">Telp</label>
                      @error('telp')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $company->email}}">
                      <label for="email">Email</label>
                      @error('email')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                      @enderror
                    </div>
                  </div>
                <div class="col-12">
                    <div class="form-floating">
                      <input class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $company->description}}" required>
                      <label for="description">Deskripsi</label>
                      @error('description')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                      @enderror
                    </div>
                </div>
                <div class="col-12">
                  <label for="logo">Logo</label>
                      <input type="file" class="dropify" name="logo" data-default-file="{{ asset('storage/'.$company->logo) }}" data-show-errors="true" />
                      @error('logo')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                      @enderror
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

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

<script>
  $('.dropify').dropify();
</script>


  @endsection