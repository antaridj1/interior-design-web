@if($order !== null)
    <div class="card">
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
                                <td>Tipe Interior</td>
                                <td>: {{$order->type_interior->name}} Interior</td>
                            </tr>
                            <tr>
                                <td>Style Interior</td>
                                <td>: {{$order->styles_interiors}}</td>
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
                        @if(role('admin'))
                            <div class="mb-4">
                                <p><b>Nota</b></p>
                                <div class="d-flex justify-content-start">
                                    <button class="btn btn-sm {{$order->nota->count() !== 0 ? 'btn-outline-primary' : 'btn-outline-secondary'}}"
                                        data-bs-toggle="modal" data-bs-target="#notaOrderModal_{{$order->id}}"
                                        {{$order->nota->count() !== 0 ? '' : 'disabled'}}>
                                        <i class="bi bi-box-arrow-up-right"></i>
                                        Lihat Nota
                                    </button>
                                    @if($order->nota->count() !== 0 && isOverBudget($order->budget, $order->subtotal) === true)
                                        <span class="badge p-2 rounded-pill bg-danger mx-2">Subtotal Nota Melebihi Budget</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-4">
                                <p><b>Bukti Pembayaran</b></p>
                                <form method="get" action="{{ asset('storage/'.$order->bukti_bayar) }}" target="_blank">
                                    @csrf
                                    <button class="btn btn-sm {{$order->bukti_bayar !== null ? 'btn-outline-primary' : 'btn-outline-secondary'}}"
                                        {{$order->bukti_bayar !== null ? '' : 'disabled'}}>
                                        <i class="bi bi-box-arrow-up-right"></i> 
                                        Lihat Bukti Pembayaran
                                    </button>
                                </form>
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
                        <div>
                            <p><b>Komentar Customer</b></p>
                            <p>{{$order->komentar_customer?? 'Tidak ada komentar'}}</p>
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
                    @if($order->status == IS_TERKIRIM)
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#prosesModal_{{$order->id}}">
                            Proses Sekarang
                        </button>
                    @endif
                    <a href="{{route('employee.order.edit',$order->id)}}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i>
                        Update
                    </a>
                    @if(role('admin'))
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteOrderModal_{{$order->id}}">
                            <i class="bi bi-trash-fill"></i>
                            Delete
                        </button>
                    @endif
                </div>
                @include('order._modal')
            </div>
        </div>
    </div>

@else 
<div class="card">
    <div class="card-body">
        <p class="text-center m-2">Tidak ada data</p>
    </div>
</div>
@endif