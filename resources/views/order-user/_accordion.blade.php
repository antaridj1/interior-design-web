<div class="accordion accordion-flush text-start shadow-sm" id="accordionFlushExample">
    @forelse ($orders as $order)
        <div class="accordion-item">
            <h2 class="accordion-header" id="{{$order->id}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion_{{$order->id}}" aria-expanded="false" aria-controls="accordion_{{$order->id}}">
                {{$order->created_at->format('d M Y')}}
                </button>
            </h2>
            <div id="accordion_{{$order->id}}" class="accordion-collapse collapse" aria-labelledby="{{$order->id}}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    @include('order-user._card')
                </div>
            </div>
        </div>
    @empty
        <p class="card-text">Anda belum memiliki project.</p>
        <a href="{{route('orderUser.create')}}" class="btn btn-primary">Order Sekarang</a>
    @endforelse
  </div>