
<div class="card text-start">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <span>{{$order->user->name}} ({{$order->user->phone_number}})</span>
            <span class="badge rounded-pill {{$order->status_badge}}">{{$order->status_string}}</span>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Lokasi</td>
                            <td>: {{$order->location}}</td>
                        </tr>
                        <tr>
                            <td>Ukuran Ruangan</td>
                            <td>: {{$order->room_size}}</td>
                        </tr>
                        <tr>
                            <td>Kebutuhan</td>
                            <td>: {{$order->needs_string}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Interior</td>
                            <td>: {{$order->type_interior_name}} Interior</td>
                        </tr>
                        <tr>
                            <td>Style Interior</td>
                            <td>:  {{$order->styles_interiors}}</td>
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
            <div class="col-lg-12">
                <div class="mb-4">
                    <p><b>Detail</b></p>
                    <p>{{$order->detail}}</p>
                </div>
                @if($order->status !== IS_TERKIRIM)
                    <div class="mb-4">
                        <p><b>Nota</b></p>
                        <a href="{{route('orderUser.printNota', $order->id)}}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download"></i> 
                            Download Nota
                        </a>
                    </div>
                    @if($order->bukti_bayar !== null)
                        <div class="mb-4">
                            <p><b>Bukti Pembayaran</b></p>
                            <a href="{{ asset('storage/'.$order->bukti_bayar) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-info-circle"></i> 
                                Lihat Bukti Pembayaran
                            </a>
                        </div>
                    @endif
                    <div class="mb-4">
                        <p><b>Progress</b></p>
                        <div class="progress col-6">
                            <div class="progress-bar" role="progressbar" style="width: {{$order->progress}}%" aria-valuenow="{{$order->progress}}" aria-valuemin="0" aria-valuemax="100">{{$order->progress}}%</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p><b>Link Dokumen</b></p>
                        <p><a href="{{$order->documents}}">{{$order->documents}}</a></p>
                    </div>
                    <div>
                        <p><b>Gambar Terupdate</b></p>
                        <img src="{{ asset('storage/'.$order->results) }}" target="_blank" width="100%" alt="">
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            @if($order->status !== IS_TERKIRIM)
                <p>Architect : {{$order->architect->name}}</p>
            @endif
            <div></div>
            <div>
                @if($order->status !== IS_TERKIRIM)
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadBuktiBayarModal_{{$order->id}}">
                            <i class="bi bi-pencil-square"></i>
                            {{$order->bukti_bayar == null? 'Upload Bukti Pembayaran' : 'Edit Bukti Pembayaran'}}
                        </button>
                @endif
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteOrderModal_{{$order->id}}">
                    <i class="bi bi-trash-fill"></i>
                    Delete
                </button>
            </div>
            @include('order-user._modal')
        </div>
    </div>
</div>

