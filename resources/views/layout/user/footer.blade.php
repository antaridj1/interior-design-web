
<footer id="footer">
    <div class="footer-top">
        <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
            <div class="footer-info">
                <h3>{{$company->name}}</h3>
                <p>
                {{$company->address}} <br>
                <strong>Phone:</strong> {{$company->telp}}<br>
                <strong>Email:</strong> {{{$company->email}}}<br>
                </p>
                <div class="social-links mt-3">
                <a href="https://api.whatsapp.com/send/?phone=6281929202666&text&app_absent=0" class="wthatsapp"><i class="bi bi-whatsapp"></i></a>
                <a href="https://web.facebook.com/semaramulia.arsitek.7?_rdc=1&_rdr" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/semaramulia_studio/" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCwMO5kqfWtnHqjeIi4wPpqA" class="youtube"><i class="bx bxl-youtube"></i></a>
                </div>
            </div>
            </div>

            <div class="col-lg-4 ps-5 col-md-6 footer-links">
            <h4>Tautan Lainnya</h4>
            <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('orderUser.create')}}">Order</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('login')}}">Login</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('register')}}">Registrasi</a></li>
            </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-links">
                <h4>Pelayanan Kami</h4>
                <ul>
                    @foreach ($type_interiors as $type_interior)
                        <li><i class="bx bx-chevron-right"></i> <a href="#">{{$type_interior->name}}</a></li>
                    @endforeach      
                </ul>
            </div>

        </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>{{$company->name}}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
            Designed by <a href="https://bootstrapmade.com/">Iratnavibes</a>
        </div>
    </div>
</footer>