 <table class="table table-borderless datatable">
    <thead>
        <tr class="text-center">
            <th class="text-center">No.</th>
            <th class="text-center">Nama Client</th>
            <th class="text-center">Telepon</th>
            <th class="text-center">Jenis Interior</th>
            <th class="text-center">Bulan Mulai</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($orders as $order)
        <tr class="text-center">
            <td>{{$loop->iteration}}</td>
            <td>{{$order->user->name}}</td>
            <td>{{$order->user->phone_number}}</td>
            <td>{{$order->type}}</td> 
            <td>{{$order->formatted_started_month}}</td>
            <td> <span class="badge rounded-pill {{$order->status_badge}}">{{$order->status_string}}</span></td>
            <td class="text-center">
                <a href="{{route('order.show',$order->id)}}" class="btn btn-sm btn-outline-info">
                    <i class="bi bi-info-circle-fill"></i>
                </a>
                <a href="{{route('order.edit',$order->id)}}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteOrderModal_{{$order->id}}">
                    <i class="bi bi-trash-fill"></i>
                </button>
                @include('order._modal')
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>