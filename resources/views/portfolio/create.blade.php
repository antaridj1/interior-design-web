@extends('layout.app')
@section('title','Semara Interior')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Portfolio</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('employee.portfolio.index')}}">Portfolio</a></li>
            <li class="breadcrumb-item active">Tambah Portfolio</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Portfolio</h5>

              <!-- Floating Labels Form -->
              <form method="post" action="{{route('employee.portfolio.store')}}" class="row g-3" enctype="multipart/form-data">
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
                  <label for="type_interior_id" class="col-sm-2 col-form-label">Tipe interior</label>
                  <div class="col-sm-10"> 
                    <select class="form-select" aria-label="Default select example" name="type_interior_id">
                      @foreach ($type_interiors as $type_interior)
                           <option value="{{$type_interior->id}}">{{$type_interior->name}} Interior</option>
                      @endforeach
                    </select>
                    @error('type_interior_id')
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
                <div class="row mb-3"> 
                  <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                  <div class="col-sm-10"> 
                    <input type="file" id="image" class="dropify" data-height="300" name="image" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg" data-show-errors="true"/>
                    @error('image')
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

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

<script>
  $('.dropify').dropify();
</script>

  @endsection
  