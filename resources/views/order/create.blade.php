@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Buat Order</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Buat Order</li>
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
              <form method="post" action="{{route('order.store')}}" class="row g-3">
                @csrf
                <div class="row">
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
                      <label for="phone_number" class="form-label">No Telepon (Whatsapp)</label>
                      <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" id="phone_number" required>
                      @error('phone_number')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group mt-3">
                      <label for="location" class="form-label">Lokasi</label>
                      <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" id="location" required>
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
                      <input type="text" name="room_size" class="form-control @error('room_size') is-invalid @enderror" value="{{ old('room_size') }}" id="room_size">
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
                      <textarea type="textarea" rows="3" name="detail" class="form-control @error('detail') is-invalid @enderror" value="{{ old('detail') }}" id="detail"></textarea>
                      @error('detail')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
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