<div class="modal fade" id="statusModal_{{$pegawai->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{($pegawai->status == true) ? 'Nonaktifkan Akun' : 'Aktifkan Akun'}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('pegawai.updateStatus',$pegawai->id)}}">
            @method('patch')
            @csrf
            <div class="form-group"> 
                <p>Apakah Anda yakin ingin {{($pegawai->status == true) ? 'menonaktifkan' : 'mangaktifkan'}} akun ini?</p>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                <button type="submit" class="btn btn-primary" >Yakin </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal_{{$pegawai->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pegawai</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('pegawai.destroy',$pegawai->id)}}">
            @method('delete')
            @csrf
            <div class="form-group"> 
                <p>Apakah Anda yakin untuk menghapus akun ini?</p>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" >Ya </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
