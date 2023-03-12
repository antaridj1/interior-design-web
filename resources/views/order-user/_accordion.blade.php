<div class="accordion accordion-flush shadow-sm" id="accordionFlushExample">
    @foreach ($orders as $order)
        <div class="accordion-item">
            <h2 class="accordion-header" id="{{$order->id}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion_{{$order->id}}" aria-expanded="false" aria-controls="accordion_{{$order->id}}">
                {{$order->created_at->format('d M Y')}}
                </button>
            </h2>
            <div id="accordion_{{$order->id}}" class="accordion-collapse collapse" aria-labelledby="{{$order->id}}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body text-start">
                    @include('order-user._card')
                </div>
            </div>
        </div>
    @endforeach
  </div>