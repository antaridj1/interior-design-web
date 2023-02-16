@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-12 col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8 col-sm-12">
                      <h5 class="card-title mb-0">Halo, {{auth()->user()->name}}</h5>
                      @if (auth()->user()->role === 'unit')
                          <span class="mt-0">Ada {{$jumlah_selesai_diproses}} laporan telah selesai diproses, verifikasi sekarang!</span>
                      @elseif(auth()->user()->role === 'pegawai')
                          <span class="mt-0">Ada {{$jumlah_diterima}} laporan masuk, proses sekarang!</span>
                      @else 
                          <span class="mt-0">Ada {{$jumlah_terkirim}} laporan masuk, verifikasi sekarang!</span>
                      @endif
                      
                    </div>
                    <div class="col-md-4 mt-3 col-sm-12 d-flex align-items-center justify-content-end">
                      @if (auth()->user()->role === 'unit')
                          <a href="{{route('laporan.index')}}?status={{IS_SELESAI_DIPROSES}}" class="btn btn-primary rounded-pill"> <i class="bi bi-journal-text"></i> Lihat Laporan</a>
                      @elseif(auth()->user()->role === 'pegawai')
                          <a href="{{route('laporan.index')}}?status={{IS_DITERIMA}}" class="btn btn-primary rounded-pill"> <i class="bi bi-journal-text"></i> Lihat Laporan</a>
                      @else 
                          <a href="{{route('laporan.index')}}?status='{{IS_TERKIRIM}}'" class="btn btn-primary rounded-pill"> <i class="bi bi-journal-text"></i> Lihat Laporan</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Terkirim -->
            <div class="col-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  @if (auth()->user()->role === 'unit')
                      <h5 class="card-title">Terkirim <span>| Per 2022</span></h5>
                  @else
                      <h5 class="card-title">Laporan Masuk <span>| Per 2022</span></h5>
                  @endif
                 
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cursor"></i>
                    </div>
                    <div class="ps-3">
                      @if (auth()->user()->role === 'pegawai')
                        <h6>{{$jumlah_diterima}}</h6>
                      @else
                        <h6>{{$jumlah_terkirim}}</h6>
                      @endif
                      <span class="text-muted small pt-2 ps-1">laporan</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Terkirim -->
            <!-- Diproses -->
            <div class="col-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Diproses <span>| Per 2022</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$jumlah_diproses}}</h6>
                      <span class="text-muted small pt-2 ps-1">laporan</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Diproses -->
            <!-- Selesai -->
            <div class="col-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Tuntas<span> | Per 2022</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$jumlah_selesai}}</h6>
                      <span class="text-muted small pt-2 ps-1">laporan</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Selesai -->
          </div>
          @if(auth()->user()->role === 'master_admin')
            <div class="row">
              <!-- Recent Sales -->
              <div class="col-12">
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h5 class="card-title">Laporan <span>| Per 2022</span></h5>
                      <div class="mt-3">
                        <a href="{{route('laporan.index')}}" class="btn btn-primary btn-sm">Lihat Semua</a>
                      </div>
                    </div>
                    @include('laporan._table')

                  </div>

                </div>
              </div><!-- End Recent Sales -->
            </div>
          @else
          @if($laporan)
            <div class="row">
              <!-- Recent Sales -->
              <div class="col-12">
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">Laporan Terakhir <span>| Per 2022</span></h5>
                  <div class="mt-3">
                    <a href="{{route('laporan.index')}}" class="btn btn-primary btn-sm">Lihat Semua</a>
                  </div>
                </div>
                @include('laporan._card')
              </div><!-- End Recent Sales -->
            </div>
            @else
              <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                  <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <h5 class="card-title">Laporan <span>| Per 2022</span></h5>
                        <div class="mt-3">
                          <a href="{{route('laporan.index')}}" class="btn btn-primary btn-sm">Lihat Semua</a>
                        </div>
                      </div>
                      @include('laporan._table')
                    </div>
                  </div>
                </div><!-- End Recent Sales -->
              </div>
            @endif
          @endif
      </div>
    </section>

  </main><!-- End #main -->
  @endsection