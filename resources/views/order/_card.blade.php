
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span>{{$order->user->name}} ({{$order->user->phone_number}})</span>
                <span class="badge rounded-pill {{$order->status_badge}}">{{$order->status_string}}</span>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-borderless text-start">
                <tr>
                    <td>Title</td>
                    <td>: {{$order->title}}</td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td>: {{$order->location}}</td>
                </tr>
                <tr>
                    <td>Kebutuhan</td>
                    <td>: {{$order->needs}}</td>
                </tr>
                <tr>
                    <td>Jenis Interior</td>
                    <td>: {{$order->type}}</td>
                </tr>
                <tr>
                    <td>Ukuran Ruangan</td>
                    <td>: {{$order->room_size}}</td>
                </tr>
                <tr>
                    <td>Style Interior</td>
                    <td>: Modern, Minimalis</td>
                </tr>
                <tr>
                    <td>Budget</td>
                    <td>: {{$order->budget}}</td>
                </tr>
                <tr>
                    <td>Bulan project dimulai</td>
                    <td>: {{$order->formatted_started_month}}</td>
                </tr>
                <tr>
                    <td>Detail</td>
                    <td>: {{$order->detail}}</td>
                </tr>
                <tr>
                    <td>Dealed Fee</td>
                    <td>: {{$order->dealed_fee}}</td>
                </tr>
                <tr>
                    <td>Progress</td>
                    <td class="d-flex">
                        <span>: </span>
                        <div class="progress col-6 mt-1 ms-1">
                            <div class="progress-bar" role="progressbar" style="width: {{$order->progress}}%" aria-valuenow="{{$order->progress}}" aria-valuemin="0" aria-valuemax="100">{{$order->progress}}</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>More Documents (Google Drive)</td>
                    <td>: {{$order->documents}}</td>
                </tr>
                <tr>
                    <td>Result</td>
                    <td>:</td>
                </tr>
            </table>
            <img src="{{ asset('storage/'.$order->results) }}" width="100%" alt="">
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <p>Architect : {{$order->architect->name}}</p>
                <div>
                    <a href="{{route('order.edit',$order->id)}}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteOrderModal_{{$order->id}}">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </div>
                @include('order._modal')
            </div>
        </div>
    </div>
