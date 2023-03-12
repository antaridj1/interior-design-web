<div class="modal fade" id="deleteOrderModal_{{$order->id}}" tabindex="-1" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteOrderModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('employee.order.destroy',$order->id)}}">
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

<div class="modal fade" id="rabOrderModal" tabindex="-1" aria-labelledby="rabOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="rabOrderModalLabel">Tambah Data Nota</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          @csrf
          <div class="mb-3">
            <label for="name_rab" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="name_rab" name="name_rab">
          </div>
          <div class="mb-3">
            <label for="price_rab" class="form-label">Harga Satuan</label>
            <input type="number" min="0" class="form-control" id="price_rab" name="price_rab">
          </div>
          <div class="mb-3">
            <label for="qty_rab" class="form-label">Jumlah</label>
            <input type="number" min="0" class="form-control" id="qty_rab" name="qty_rab">
          </div>
          <div class="mb-3">
            <button type="button" class="btn btn-primary" id="simpan" data-bs-dismiss="modal">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@if(isset($architects))
    <div class="modal fade" id="prosesModal_{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Proses Order</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('employee.order.updateStatus',$order->id)}}?status={{IS_DIPROSES}}">
            @method('patch')
            @csrf
            <div class="form-group"> 
                <p>Setelah Anda memproses order, pegawai akan memproses order</p>
                <p>Pilih pegawai yang akan memproses order ini :</p>
                @foreach ($architects as $architect)
                    <div class="form-check border py-3 mb-2" style="padding-left: 2.5rem; border-radius: 10px;">
                        <input class="form-check-input" type="radio" name="architect_id" id="architect_{{$architect->id}}" value="{{$architect->id}}">
                        <label class="form-check-labelv ml-2" for="architect_{{$architect->id}}">
                            {{$architect->name}} 
                        </label>
                        {{-- @if ($architect->status == true)
                            <span class="badge badge-sm rounded-pill bg-success">Available</span>
                        @else
                            <span class="badge rounded-pill bg-secondary">Not Available</span>
                        @endif --}}
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
@endif

@if($order->nota->count() !== 0)
    <div class="modal fade" id="notaOrderModal_{{$order->id}}" tabindex="-1" aria-labelledby="notaOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="notaOrderModalLabel">Nota Interior</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('order._nota')
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('employee.order.printNota', $order->id)}}" class="btn btn-sm btn-primary">
                            <i class="bi bi-download"></i> 
                            Download Nota
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif