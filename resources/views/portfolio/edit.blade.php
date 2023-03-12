@extends('layout.app')
@section('title','Semara Interior')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Portfolio</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('employee/home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('employee.portfolio.index')}}">Portfolio</a></li>
            <li class="breadcrumb-item active">Edit Portfolio</li>
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
              <form method="post" action="{{route('employee.portfolio.update',$portfolio->id)}}" class="row g-3" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $portfolio->name}}">
                    <label for="name">Nama Portfolio</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" name="type_interior_id">
                      @foreach ($type_interiors as $type_interior)
                          <option {{$type_interior->id == $portfolio->type_interior_id ? 'selected' : ''}} 
                            value="{{$type_interior->id}}">
                            {{$type_interior->name}} Interior
                          </option>
                      @endforeach
                    </select>
                    <label for="name">Tipe Interior</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-floating">
                    <input type="file" class="dropify" data-height="300" name="image" data-default-file="{{ asset('storage/'.$portfolio->image) }}" />
                    <label for="image">Gambar</label>
                    @error('image')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                      <input class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $portfolio->description}}" required>
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