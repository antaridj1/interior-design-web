<div class="modal fade" id="terimaModal_{{$laporan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Terima Laporan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('laporan.verifikasi',$laporan->id)}}?status={{IS_DITERIMA}}">
            @method('patch')
            @csrf
            <div class="form-group"> 
                <p>Setelah Anda menerima laporan, pegawai akan memproses laporan</p>
                <p>Pilih pegawai yang akan memproses laporan ini :</p>
                @foreach ($pegawais as $pegawai)
                  <div class="form-check border py-3 mb-2" style="padding-left: 2.5rem; border-radius: 10px;">
                    <input class="form-check-input" type="radio" {{($pegawai->status == false)? 'disabled' : ''}} name="pegawai" id="pegawai_{{$pegawai->id}}" value="{{$pegawai->id}}">
                    <label class="form-check-labelv ml-2" for="pegawai_{{$pegawai->id}}">
                      {{$pegawai->name}} 
                    </label>
                    @if ($pegawai->status == true)
                      <span class="badge badge-sm rounded-pill bg-success">Tersedia</span>
                    @else
                        <span class="badge rounded-pill bg-secondary">Tidak Tersedia</span>
                    @endif
                  </div> 
                @endforeach
            </div>
           
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" >Ya </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>