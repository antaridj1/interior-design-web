@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Buat Laporan</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Buat Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Laporan</h5>

              <!-- Floating Labels Form -->
              <form method="post" action="{{route('laporan.store')}}" class="row g-3">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" id="floatingSelect" aria-label="State">
                      <option value="" selected>-- Pilih Kategori --</option>
                      <option value="IT">IT</option>
                      <option value="LOGISTIK">LOGISTIK</option>
                      <option value="BRAND">BRAND</option>
                      <option value="NASABAH">NASABAH</option>
                    </select>
                    <label for="floatingSelect">Kategori</label>
                    @error('kategori')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <input class="form-control @error('judul') is-invalid @enderror" name="judul" id="floatingPerihal" value="{{ @old('judul') }}">
                    <label for="floatingPerihal">Judul</label>
                    @error('judul')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control @error('detail') is-invalid @enderror" id="floatingTextarea" name="detail" style="height: 200px;" value="{{ @old('detail') }}"></textarea>
                    <label for="floatingTextarea">Detail</label>
                    @error('detail')
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