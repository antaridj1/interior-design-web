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
              <form method="post" action="{{route('order.update', $order->id)}}" class="row g-3" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{$order->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: {{$order->user->email}}</td>
                                </tr>
                                <tr>
                                    <td>No Telp</td>
                                    <td>: {{$order->user->phone_number}}</td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>: {{$order->location}}</td>
                                </tr>
                                <tr>
                                    <td>Ukuran Ruangan</td>
                                    <td>: {{$order->room_size}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Kebutuhan</td>
                                    <td>: {{$order->needs_string}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Interior</td>
                                    <td>: {{$order->type}}</td>
                                </tr>
                                <tr>
                                    <td>Style Interior</td>
                                    <td>: Modern, Minimalis</td>
                                </tr>
                                <tr>
                                    <td>Budget</td>
                                    <td>: {{$order->budget}}</td>
                                </tr>
                                <tr>
                                    <td>Bulan project dimulai</td>
                                    <td>: {{$order->formatted_started_month}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <hr>
                <div class="row">
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
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option {{$order->status === 0 ? 'selected' : ''}} value="0">Pending</option>
                        <option {{$order->status === 1 ? 'selected' : ''}} value="1">On Going</option>
                        <option {{$order->status === 2 ? 'selected' : ''}} value="2">Done</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="progress" class="form-label">Progress (%)</label>
                    <input type="number" name="progress" class="form-control @error('progress') is-invalid @enderror" value="{{ $order->progress }}" id="progress" required>
                    @error('progress')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="results" class="form-label">Results</label>
                    <input type="file" id="results" class="dropify" data-height="300" name="results" data-default-file="{{ asset('storage/'.$order->results) }}" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg" data-show-errors="true" multiple/>
                    @error('results')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="documents" class="form-label">More Documents (Link Google Drive)</label>
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