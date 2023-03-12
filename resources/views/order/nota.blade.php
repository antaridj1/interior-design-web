<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title class="text-center">Nota Anggaran Biaya Semara Interior</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<header>
     <h3 class="mb-5 text-center">Nota Order</h3>
</header>
<body>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5><b>Informasi Client</b></h5>
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
                    <h5><b>Informasi Interior</b></h5>
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
                    <h5 class="my-2"><b>Informasi Anggaran Biaya</b></h5>
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
        </div>
    </div>

<script type="text/javascript">
    window.print();
    window.onafterprint = function() {
        
        history.go(-1);
    }; 
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>