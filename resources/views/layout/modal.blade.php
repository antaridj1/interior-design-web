<div class="modal fade" id="exampleModal_{{$laporan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('laporan.destroy',$laporan->id)}}">
            @method('delete')
            @csrf
            <div class="form-group"> 
                <p>Apakah Anda yakin untuk menghapus data ini?</p>
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
  
  <div class="modal fade" id="tolakModal_{{$laporan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tolak Laporan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('laporan.verifikasi',$laporan->id)}}?status={{IS_DITOLAK}}">
            @method('patch')
            @csrf
            <div class="form-group"> 
              <textarea class="form-control mb-3 @error('alasan_ditolak') is-invalid @enderror" id="floatingTextarea" name="alasan_ditolak" style="height: 100px;" placeholder="Tuliskan alasan Anda menolak laporan ini"></textarea>
              @error('alasan_ditolak')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
              @enderror
            </div>
            <div class="d-flex justify-content-between mt-2">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                <button type="submit" class="btn btn-primary" >Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="alasanModal_{{$laporan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Alasan Laporan Ditolak</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>{{$laporan->alasan_ditolak}}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="prosesModal_{{$laporan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Proses Laporan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('laporan.verifikasi',$laporan->id)}}?status={{IS_DIPROSES}}">
            @method('patch')
            @csrf
            <div class="form-group"> 
                <p>Setelah Anda memilih untuk memproses laporan, Anda yang akan menjadi penanggungjawab laporan ini</p>
                <p>Apakah Anda yakin untuk memproses laporan ini?</p>
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

  <div class="modal fade" id="unverifiedModal_{{$laporan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Proses Laporan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('laporan.verifikasi',$laporan->id)}}?status={{IS_SELESAI_DIPROSES}}">
            @method('patch')
            @csrf
            <div class="form-group"> 
                <p>Setelah Anda menekan tombol selesai, laporan perlu diverifikasi dari Unit agar dinyatakan selesai</p>
                <p>Apakah laporan sudah terselesaikan?</p>
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


  <div class="modal fade" id="verifiedModal_{{$laporan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Proses Laporan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('laporan.verifikasi',$laporan->id)}}?status={{IS_TUNTAS}}">
            @method('patch')
            @csrf
            <div class="form-group"> 
                <p>Setelah Anda menekan tombol selesai, laporan akan dianggap selesai sepenuhnya</p>
                <p>Apakah laporan sudah terselesaikan?</p>
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
