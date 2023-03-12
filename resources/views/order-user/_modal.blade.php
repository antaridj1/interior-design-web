<div class="modal fade" id="deleteOrderModal_{{$order->id}}" tabindex="-1" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteOrderModalLabel">Hapus Order</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('orderUser.destroy',$order->id)}}">
            @method('delete')
            @csrf
            <div class="form-group"> 
                <p>Order Anda tidak akan diproses jika menghapus order ini</p>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" >Hapus </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="uploadBuktiBayarModal_{{$order->id}}" tabindex="-1" aria-labelledby="uploadBuktiBayarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="uploadBuktiBayarModalLabel">Upload Bukti Pembayaran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route('orderUser.uploadBuktiBayar',$order->id)}}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="modal-body">
                <div class="form-group mt-3">
                    <label for="bukti_bayar" class="form-label">Bukti Pembayaran</label>
                    @if($order->bukti_bayar !== null)
                        <input type="file" 
                            id="bukti_bayar" 
                            class="dropify" 
                            data-height="300" 
                            name="bukti_bayar" 
                            data-default-file="{{ asset('storage/'.$order->bukti_bayar) }}" 
                            data-max-file-size="3M" 
                            data-allowed-file-extensions="jpg png jpeg" 
                            data-show-errors="true" 
                            multiple
                        />
                    @else
                        <input type="file" 
                            id="bukti_bayar" 
                            class="dropify" 
                            data-height="300" 
                            name="bukti_bayar" 
                            data-max-file-size="3M" 
                            data-allowed-file-extensions="jpg png jpeg" 
                            data-show-errors="true" 
                            multiple
                        />
                    @endif
                        @error('bukti_bayar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>

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
                        <a href="{{route('orderUser.printNota', $order->id)}}" class="btn btn-sm btn-primary">
                            <i class="bi bi-download"></i> 
                            Download Nota
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
