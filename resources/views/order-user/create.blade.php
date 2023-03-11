@extends('layout.user.app')

@section('content')

  @include('layout.user.header')

  <main id="main">
    <section id="contact" class="contact">
        <div class="container">
          <div class="row d-flex justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <form method="POST" action="{{ route('orderUser.store') }}" role="form" class="php-email-form">
                @csrf
                <div class="row">
                    <h2 class="text-center">Formulir Order</h2>
                    <input type="hidden" value="" id="admin_phone">
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
                        <select class="form-select form-select-lg" aria-label="Default select example" name="needs">
                            <option value="design_build">Desain dan Bangunan</option>
                            <option value="design_only">Desain Saja</option>
                            <option value="build_only">Bangunan Saja</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="isRenovation" class="form-label">Kategori Kebutuhan Anda</label>
                        <select class="form-select form-select-lg" aria-label="Default select example" name="isRenovation">
                            <option value="false">Bangunan Baru</option>
                            <option value="true">Renovasi</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="type" class="form-label">Tipe Bangunan</label>
                        <select class="form-select form-select-lg" aria-label="Default select example" name="type">
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

                        <div class="row portfolio portfolio-container" data-aos="fade-up" data-aos-delay="150">
                            @foreach ($styles as $style)
                                <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                                    <label class="image-checkbox">
                                        <img src="{{ asset('storage/'.$style->image) }}" class="img-fluid" alt="">
                                        <input type="checkbox" name="style_interior[]" value="{{$style->name}}" />
                                        <i class="fa fa-check" style="display:none;"></i>
                                        <div class="portfolio-info">
                                            <h4>{{$style->name}}</h4>
                                            <p>{{$style->description}}</p>
                                            <a href="{{ asset('storage/'.$style->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{$style->name}}"><i class="bx bx-plus"></i></a>
                                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                       
                       
                    </div>
                    <div class="form-group mt-3">
                        <label for="budget" class="form-label">Kisaran Budget</label>
                        <select class="form-select form-select-lg" aria-label="Default select example" name="budget">
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
                <div class="col-3 my-5">
                    <button class="btn btn-primary w-100" onclick="kirimPesan()" type="submit">Kirim</button>
                </div>
               
              </form>
            </div>
  
          </div>
  
        </div>
      </section>

      @include('layout.user.footer')
      @if(session()->has('status'))
      @include('layout.alert')
    @endif
  </main>
  
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
    function kirimPesan(){
        var message = 'Halo, saya sudah mengirim formulir pemesanan design interior pada web. Link : '
        var str = $('#admin_phone').val()
        var phone = str.slice(1);
        window.open('https://wa.me/'+phone+'/?text='+message , "_blank");
    }

    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
            $(this).find('.fa').show();
        }
        else {
            $(this).removeClass('image-checkbox-checked');
            $(this).find('.fa').hide();
        }
    });

    // sync the state to the input
    $(".image-checkbox").on("click", function (e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked",!$checkbox.prop("checked"))

        e.preventDefault();
    });
</script>

@endsection
    
