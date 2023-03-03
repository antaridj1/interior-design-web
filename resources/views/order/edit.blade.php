@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit order</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('employee/home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('order.index')}}">Order</a></li>
            <li class="breadcrumb-item active">Edit Order</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Order</h5>

              <!-- Floating Labels Form -->
              <form method="post" action="{{route('order.update', $order->id)}}" class="row g-3">
                @csrf
                @method('patch')
                <div class="row">
                  <div class="form-group mt-3">
                      <label for="name" class="form-label">Nama</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$order->user->name}}" id="name" required>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group mt-3">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$order->user->email}}" id="yourEmail" required>
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group mt-3">
                      <label for="phone_number" class="form-label">No Telepon (Whatsapp)</label>
                      <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ $order->user->phone_number }}" id="phone_number" required>
                      @error('phone_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group mt-3">
                      <label for="location" class="form-label">Lokasi</label>
                      <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ $order->location }}" id="location" required>
                      @error('location')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group mt-3">
                      <label for="needs" class="form-label">Apa Kebutuhan Anda?</label>
                      <select class="form-select" aria-label="Default select example" name="needs">
                          <option value="design_build">Desain dan Bangunan</option>
                          <option value="design_only">Desain Saja</option>
                          <option value="build_only">Bangunan Saja</option>
                      </select>
                  </div>
                  <div class="form-group mt-3">
                      <label for="isRenovation" class="form-label">Kategori Kebutuhan Anda</label>
                      <select class="form-select" aria-label="Default select example" name="isRenovation">
                          <option value="false">Bangunan Baru</option>
                          <option value="true">Renovasi</option>
                      </select>
                  </div>
                  <div class="form-group mt-3">
                      <label for="type" class="form-label">Tipe Bangunan</label>
                      <select class="form-select" aria-label="Default select example" name="type">
                          <option value="rumah">Rumah</option>
                          <option value="apartemen">Apartemen</option>
                      </select>
                  </div>
                  <div class="form-group mt-3">
                      <label for="room_size" class="form-label">Ukuran Ruangan</label>
                      <input type="text" name="room_size" class="form-control @error('room_size') is-invalid @enderror" value="{{$order->room_size}}" id="room_size">
                      @error('room_size')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group mt-3">
                      <label for="type" class="form-label col-12">Style Interior Yang Anda Inginkan</label>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input mr-2" type="checkbox" id="inlineCheckbox1" value="1" name="interior_style_id">
                          <label class="form-check-label" for="inlineCheckbox1"> Modern</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input mr-2" type="checkbox" id="inlineCheckbox2" value="2" name="interior_style_id">
                          <label class="form-check-label" for="inlineCheckbox2"> Minimalis</label>
                      </div>
                  </div>
                  <div class="form-group mt-3">
                      <label for="budget" class="form-label">Kisaran Budget</label>
                      <select class="form-select" aria-label="Default select example" name="budget">
                          <option value="10-20 juta">10-20 juta</option>
                          <option value="20-30 juta">20-30 juta</option>
                      </select>
                  </div>
                  <div class="form-group mt-3">
                      <label for="started_month" class="form-label">Kapan Proyek Dimulai</label>
                      <input type="month" name="started_month" class="form-control @error('started_month') is-invalid @enderror" value="{{ old('started_month') }}" id="started_month">
                      @error('started_month')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group mt-3">
                    <label for="detail" class="form-label">Detail Mengenai Interior</label>
                    <textarea type="textarea" rows="3" name="detail" class="form-control @error('detail') is-invalid @enderror" id="detail">{{$order->detail}}</textarea>
                    @error('detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group mt-3">
                    <label for="employee_id" class="form-label">Architect</label>
                    <select class="form-select" aria-label="Default select example" name="employee_id">
                        <option value="1">Architect 1 (Tersedia)</option>
                        <option value="2">Architect 2 (Tidak Tersedia)</option>
                    </select>
                </div>
                  <div class="form-group mt-3">
                    <label for="dealed_fee" class="form-label">Dealed Fee (Rp)</label>
                    <input type="text" name="dealed_fee" class="form-control @error('dealed_fee') is-invalid @enderror" value="{{ $order->dealed_fee }}" id="dealed_fee" required>
                    @error('dealed_fee')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="progress" class="form-label">Progress</label>
                    <input type="number" name="progress" class="form-control @error('progress') is-invalid @enderror" value="{{ $order->progress }}" id="progress" required>
                    @error('progress')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="results" class="form-label">Results</label>
                    <input type="file" id="image" class="dropify" data-height="300" name="image" data-default-file="{{$order->results}}" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg" data-show-errors="true" multiple/>
                    @error('results')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="documents" class="form-label">More Documents (Link Goodle Drive)</label>
                <input type="text" name="documents" class="form-control @error('documents') is-invalid @enderror" value="{{$order->documents}}" id="documents">
                @error('documents')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
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
  </main><!-- End #main -->

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

<script>
  $('.dropify').dropify();
</script>
  @endsection