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
        <h1 class="modal-title fs-5" id="rabOrderModalLabel">Tambah Data Barang</h1>
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
            <input type="number" class="form-control" id="price_rab" name="price_rab">
          </div>
          <div class="mb-3">
            <label for="qty_rab" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="qty_rab" name="qty_rab">
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
