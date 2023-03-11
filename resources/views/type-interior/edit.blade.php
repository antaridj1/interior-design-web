@extends('layout.app')
@section('title','Semara Interior')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Tipe Interior</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('employee/home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('employee.typeInterior.index')}}">Tipe Interior</a></li>
            <li class="breadcrumb-item active">Edit Tipe Interior</li>
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
              <form method="post" action="{{route('employee.typeInterior.update',$type_interior->id)}}" class="row g-3">
                @csrf
                @method('patch')
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $type_interior->name}}">
                    <label for="name">Nama Tipe Interior</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                      <input class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $type_interior->description}}" required>
                      <label for="description">Deskripsi</label>
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
  </main><!-- End #main -->

  @endsection