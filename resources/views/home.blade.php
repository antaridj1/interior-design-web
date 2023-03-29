@extends('layout.app')
@section('title','Semara Interior')

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
                      <h5 class="card-title mb-0">Halo, {{auth()->guard('employee')->user()->name}} </h5>
                      <span class="mt-0">Hari ini Anda memiliki {{$jumlah_today}} orderan baru, periksa sekarang!</span>
                      <div class="col-4 mt-3">
                        <a href="{{route('employee.order.index')}}?filter=today" class="btn btn-outline-primary"> <i class="bi bi-journal-text"></i> Lihat Order</a>
                      </div>
          
                    </div>
                   
                    
                    <div class="col-md-4 mt-3 col-sm-12 d-flex align-items-center justify-content-end">
                      <img src="{{asset('asset/img/payment2.svg')}}" width="250px" alt="">
                    

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            @if (role('admin'))
              <div class="col-4">
                <a href="{{route('employee.order.index')}}?status=0">
                  <div class="card info-card sales-card">
                    <div class="card-body">
                      <h5 class="card-title">Project Masuk <span> | Per 2023</span></h5>
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi bi-send"></i>
                        </div>
                        <div class="ps-3">
                          <h6>{{$jumlah_masuk}}</h6>
                          <span class="text-muted small pt-2 ps-1">Project</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            @endif
            <div class="{{(role('admin'))? 'col-4' : 'col-6'}}">
              <a href="{{route('employee.order.index')}}?status=1">
                <div class="card info-card customers-card">
                  <div class="card-body">
                    <h5 class="card-title">On Going Project <span>| Per 2023</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-arrow-repeat "></i>
                      </div>
                      <div class="ps-3">
                        
                          <h6>{{$jumlah_diproses}}</h6>
                      
                        <span class="text-muted small pt-2 ps-1">Project</span>
                      </div>
                    </div>
                  </div>

                </div>
              </a>
            </div><!-- End Terkirim -->
            <!-- Diproses -->
            <div class="{{(role('admin'))? 'col-4' : 'col-6'}}">
              <a href="{{route('employee.order.index')}}?status=2">
                <div class="card info-card revenue-card">
                  <div class="card-body">
                    <h5 class="card-title">Project Selesai <span> | Per 2023</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi bi-check"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$jumlah_selesai}}</h6>
                        <span class="text-muted small pt-2 ps-1">Project</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="row">
            <!-- Recent Sales -->
            <div class="col-12"> 
              @if (role('admin'))
                <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h5 class="card-title">Order <span>| Hari Ini</span></h5>
                    </div>
                    @include('order._table')
                  </div>
                </div>
              @else
                <div class="d-flex justify-content-between">
                  <h5 class="card-title">Project Terakhir <span> | Per 2023</span></h5>
                  <div class="mt-3">
                    <a href="" class="btn btn-primary btn-sm">Lihat Semua</a>
                  </div>
                </div>
                @include('order._card')
              @endif
            </div>
          </div>
    </section>

  </main><!-- End #main -->
  @endsection