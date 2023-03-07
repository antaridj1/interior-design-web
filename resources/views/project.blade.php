@extends('layout.user.app')

@section('content')

  @include('layout.user.header')

  <main id="main">
    <section id="contact" class="contact">
        <div class="container">
          <div class="card text-center">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="true" id="sent" href="#">Sent</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="true" id="ongoing" href="#">On Going</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="history">History</a>
                </li>
              </ul>
            </div>
            <div class="card-body" id="sentCard">
              <h5 class="card-title">Order Terkirim</h5>
              @forelse ($orders_sent as $order)
                  @include('order._card')
              @empty
                <p class="card-text">Anda belum melakukan order.</p>
                <a href="{{route('orderUser')}}" class="btn btn-primary">Order Sekarang</a>
              @endforelse
              
            </div>
            <div class="card-body" id="ongoingCard" style="display:none;">
              <h5 class="card-title">On Going Project</h5>
              @forelse ($orders_ongoing as $order)
                  @include('order._card')
              @empty
                <p class="card-text">Anda belum memiliki project.</p>
                <a href="{{route('orderUser')}}" class="btn btn-primary">Order Sekarang</a>
              @endforelse
              
            </div>
            <div class="card-body" id="historyCard" style="display:none;">
              <h5 class="card-title">History Project</h5>
              @include('order._accordion')
            </div>
          </div>
  
        </div>
      </section>

      @include('layout.user.footer')
  </main>

  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

  <script>
    $(document).ready(function(){
      $('#ongoing').on('click', function(){
        $('#ongoingCard').show()
        $('#historyCard').hide()
        $('#sentCard').hide()
        
        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $('#history').removeClass('active');
          $('#sent').removeClass('active');
        }
      })

      $('#history').on('click', function(){
        $('#ongoingCard').hide()
        $('#historyCard').show()
        $('#sentCard').hide()

        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $('#ongoing').removeClass('active');
          $('#sent').removeClass('active');
        }
      })

      $('#sent').on('click', function(){
        $('#ongoingCard').hide()
        $('#sentCard').show()
        $('#historyCard').hide()

        if(!$(this).hasClass('active')){
          $(this).addClass('active');
          $('#ongoing').removeClass('active');
          $('#history').removeClass('active');
        }
      })
    })
  </script>

@endsection
    
