<div class="modal fade" id="deleteOrderModal_{{$order->id}}" tabindex="-1" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteOrderModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('order.destroy',$order->id)}}">
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
