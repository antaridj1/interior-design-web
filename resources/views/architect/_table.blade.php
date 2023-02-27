 <table class="table table-borderless datatable">
    <thead>
    <tr>
        <th class="text-center" scope="col">No</th>
        <th class="text-center" scope="col">Nama</th>
        <th class="text-center" scope="col">Email</th>
        <th class="text-center" scope="col">Jumlah Project Selesai</th>
        <th class="text-center" scope="col">Status</th>
        <th class="text-center" scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($architects as $architect)
        <tr>
            <th class="text-center" scope="row">{{$loop->iteration}}</th>
            <td class="text-center">{{$architect->name}}</td>
            <td class="text-center">{{$architect->email}}</td>
            <td class="text-center">{{$architect->jumlah_laporan_ditangani()}}</td>
            <td class="text-center">
                @if ($architect->status == true)
                    <span class="badge rounded-pill bg-success">Tersedia</span>
                @else
                    <span class="badge rounded-pill bg-danger">Tidak Tersedia</span>
                @endif 
            </td>
            <td class="text-center">
                <a href="{{route('architect.edit',$architect->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$architect->id}}">
                    <i class="bi bi-trash-fill"></i>
                </button>
                @include('architect.modal')
            </td>
        </tr>
    @empty
        <tr>
            <td>Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>