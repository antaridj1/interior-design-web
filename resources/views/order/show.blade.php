@extends('layout.app')
@section('title','Dashboard | BRI')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">   
        <h1>Laporan</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('laporan.index')}}">Laporan</a></li>
            <li class="breadcrumb-item active">Detail Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Recent Sales -->
                <div class="col-12"> 
                   @include('laporan._card')
                </div><!-- End Recent Sales -->
            </div>
      </div>
      
    </section>
    
    @if(session()->has('status'))
      @include('layout.alert')
    @endif
  </main><!-- End #main -->
  @endsection