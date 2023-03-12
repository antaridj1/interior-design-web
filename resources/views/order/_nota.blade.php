<div class="row">
    <div class="col-6">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Nama Client</td>
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
            </tbody>
        </table>
    </div>
    <div class="col-6">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Ukuran Ruangan</td>
                    <td>: {{$order->room_size}}</td>
                </tr>
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
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table col-7 table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th class="text-end">Harga (Rp)</th>
                    <th class="text-end">Total (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->nota as $item)
                    <td>{{$item->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td class="text-end">{{number_format($item->price,0)}}</td>
                    <td class="text-end">{{number_format($item->total,0)}}</td>
                @endforeach
        </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">SUBTOTAL</th>
                    <th class="text-end">Rp {{number_format($order->subtotal,0)}}</th>
                </tr>
            </tfoot>
        </table>  
    </div> 
</div>