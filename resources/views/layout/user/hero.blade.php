<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>{{$company->name}}</h1>
      <h2>{{$company->description}}</h2>
      <a href="{{route('orderUser.create')}}" class="btn-get-started scrollto">Order Sekarang</a>
    </div>
  </section>
