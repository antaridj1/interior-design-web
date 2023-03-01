<div class="accordion accordion-flush" id="accordionFlushExample">
    @forelse ($orders as $order)
        <div class="accordion-item">
            <h2 class="accordion-header" id="{{$order->id}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion_{{$order->id}}" aria-expanded="false" aria-controls="accordion_{{$order->id}}">
                {{$order->created_at}}
                </button>
            </h2>
            <div id="accordion_{{$order->id}}" class="accordion-collapse collapse" aria-labelledby="{{$order->id}}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    @include('order._card')
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Accordion Item #2
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Accordion Item #3
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
            </div>
        </div>
    @empty
        <p class="card-text">Anda belum memiliki project.</p>
        <a href="{{route('orderUser')}}" class="btn btn-primary">Order Sekarang</a>
    @endforelse
  </div>