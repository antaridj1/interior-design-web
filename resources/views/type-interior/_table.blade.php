 <table class="table table-borderless datatable">
    <thead>
    <tr>
        <th class="text-center" scope="col">No</th>
        <th class="text-center" scope="col">Nama</th>
        <th class="text-center" scope="col">Deskripsi</th>
        <th class="text-center" scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($type_interiors as $type_interior)
        <tr>
            <th class="text-center" scope="row">{{$loop->iteration}}</th>
            <td class="text-center">{{$type_interior->name}}</td>
            <td class="text-center">{{$type_interior->description}}</td>
            <td class="text-center">
                <a href="{{route('employee.typeInterior.edit',$type_interior->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$type_interior->id}}">
                    <i class="bi bi-trash-fill"></i>
                </button>
                @include('type-interior._modal')
            </td>
        </tr>
    @empty
        <tr>
            <td>Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>