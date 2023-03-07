 <table class="table table-borderless datatable">
    <thead>
    <tr>
        <th class="text-center" scope="col">No</th>
        <th class="text-center" scope="col">Gambar</th>
        <th class="text-center" scope="col">Nama</th>
        <th class="text-center" scope="col">Deskripsi</th>
        <th class="text-center" scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($style_interiors as $style_interior)
        <tr>
            <th class="text-center" scope="row">{{$loop->iteration}}</th>
            <td class="text-center"><img src="{{ asset('storage/'.$style_interior->image) }}" width="200px" alt=""></td>
            <td class="text-center">{{$style_interior->name}}</td>
            <td class="text-center">{{$style_interior->description}}</td>
            <td class="text-center">
                <a href="{{route('styleInterior.edit',$style_interior->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$style_interior->id}}">
                    <i class="bi bi-trash-fill"></i>
                </button>
                @include('style-interior.modal')
            </td>
        </tr>
    @empty
        <tr>
            <td>Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>