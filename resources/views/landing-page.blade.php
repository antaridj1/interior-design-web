@extends('layout.user.app')

@section('content')

  @include('layout.user.header')
  @include('layout.user.hero')

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="{{asset('assets/img/about.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>MENGAPA SEMARA MULIA STUDIO?</h3>
            
            <ul>
              <li><i class="bi bi-check-circle"></i> Menyediakan jasa pembuatan design dengan visualisasi 3D</li>
              <li><i class="bi bi-check-circle"></i> Memproduksi interior custom sesuai dengan interior impian Anda</li>
              <li><i class="bi bi-check-circle"></i> Dikerjakan oleh tim yang sudah berpengalaman</li>
            </ul>
            <p>
                Semara Mulia Studio menghadirkan interior dengan kualitas dan pelayanan  terbaik. dengan berbagai macam keunggulan yang dimiliki serta dikerjakan oleh tim yang sudah berpengalaman. kami yakin mewujudkan interior impian anda.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up">
            <div class="box">
              <span>01</span>
              <h4>Design</h4>
              <p>Anda dapat memilih untuk memesan desain saja tanpa membangun interior</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="150">
            <div class="box">
              <span>02</span>
              <h4>Build</h4>
              <p>Anda dapat memilih untuk membangun saja seperti merenovasi rumah atau ruangan</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <span>03</span>
              <h4>Design & Build</h4>
              <p>Tentunya Anda juga dapat memilih untuk memesan desain dan bangun interior sekaligus dengan jasa kami</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="row d-flex align-items-center">
          <div class="col-12 m-3">
            <h3>{{$company->address}}</h3>
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <span>Pelayanan Kami</span>
          <h2>Pelayanan Kami</h2>
          <p>Melayani segala jenis interior</p>
        </div>

        <div class="row">
          @foreach ($type_interiors as $type_interior)
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <div class="icon-box" style="width:400px">
                  <div class="icon"><i class="bx bxl-dribbble"></i></div>
                  <h4><a href="">{{$type_interior->name}} Interior</a></h4>
                  <p>{{$type_interior->description}}</p>
                </div> 
              </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>MENGAPA SEMARA MULIA STUDIO?</h3>
          <p> 
            Semara Mulia Studio menghadirkan interior dengan kualitas dan pelayanan  terbaik. dengan berbagai macam keunggulan yang dimiliki serta dikerjakan oleh tim yang sudah berpengalaman. kami yakin mewujudkan interior impian anda.
          </p>
          <a class="cta-btn" href="#">Hubungi Kami</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <span>Portfolio</span>
          <h2>Portfolio</h2>
          <p>Kami siap mewujudkan interior impian Anda</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach ($type_interiors as $type_interior)
                  <li data-filter=".filter_{{$type_interior->id}}">{{$type_interior->name}}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="150">
          @foreach ($portfolios as $portfolio)
          <div class="col-lg-4 col-md-6 portfolio-item filter_{{$portfolio->type_interior_id}}">
            <img src="{{ asset('storage/'.$portfolio->image) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$portfolio->name}}</h4>
              <p>{{$portfolio->description}}</p>
              <a href="{{ asset('storage/'.$portfolio->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <span>Testimonial</span>
          <h2>Testimonial</h2>
          <p>Keunggulan Semara Interior telah dibuktikan oleh sebagian client kami</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="{{asset('assets/img/portfolio/testi.jpeg')}}" alt="">
              <h4>Ibu Rimi</h4>
              <span>Penatih, Denpasar, Bali</span>
              <p>
                "Jujurly rumah ini amat sangat ketolong sama interiornya, pada bilang bagus bange interiornya, pengerjaannya rapi banget"
              </p>
              <div class="social">
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="{{asset('assets/img/portfolio/testi1.jpeg')}}" alt="">
              <h4>Kak Heppy</h4>
              <span>Lukluk, Mengwi, Badung</span>
              <p>
                "Bagus banget, bintang lima, pasangannya rapi"
              </p>
              <div class="social">
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="{{asset('assets/img/image_default.png')}}" alt="">
              <h4>Oka Putri</h4>
              <span>Denpasar, Bali</span>
              <p>
                "Thanks to Semara Studio sudah mewujudkan meja customku sesuai request banget"
              </p>
              <div class="social">
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
                <i class="bi bi-star-fill" style="color:rgb(255, 221, 0)"></i>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Kontak</span>
          <h2>Kontak</h2>
          <p>Hubungi kami melalui kontak berikut</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Alamat</h3>
              <p>{{$company->address}}</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>{{$company->email}}</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Telp</h3>
              <p>{{$company->telp}}</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
@include('layout.user.footer')
  </main><!-- End #main -->
@endsection