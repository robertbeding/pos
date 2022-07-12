

<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="post" class="form-horizontal">
      @csrf
      @method('post')

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h5 class="modal-title" ></h5>
        </div>
        <div class="modal-body">
          <div class="form-group row">
          <label for="nama_produk" class="col-md-2 col-md-offset-1 control-label">Nama</label>
            <div class="col-md-6">
              <input type="text" name="nama_produk" id="nama_produk" class="form-control" required autofocus>
            <span class="help-block with errors"></span>
          </div>
          </div>

          {{-- ===================================PENTING RELASI TABEL================================ --}}
          <div class="form-group row">
            <label for="id_kategori" class="col-md-2 col-md-offset-1 control-label">Kategori</label>
            <div class="col-md-6">
              <select name="id_kategori" id="id_kategori" class="form-control" required >
                <option value="">Pilih Kategori</option>
                @foreach ($var_kategori as $key =>$item)
                    <option value="{{ $key }}">{{ $item }}</option>
                @endforeach
              </select>
              <span class="help-block with errors"></span>
            </div>
          </div>
          {{-- // PERGI KE PRODUKCONTROLLER BAGIAN FUNGSI INDEX
            MASUKKAN :
              $var_kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori'); // pluck(' yang dibutuhkan nama_kategori', ' dan keynya yang di panggil id_kategori')
              return view('produk.index',compact('var_kategori'));
             --}}
          {{-- ===================================PENTING RELASI TABEL================================ --}}
        
          <div class="form-group row">
            <label for="merk" class="col-md-2 col-md-offset-1 control-label">merk</label>
              <div class="col-md-6">
                <input type="text" name="merk" id="merk" class="form-control" required autofocus>
              <span class="help-block with errors"></span>
            </div>
            </div>
            <div class="form-group row">
              <label for="harga_beli" class="col-md-2 col-md-offset-1 control-label">Harga Beli</label>
                <div class="col-md-6">
                  <input type="number" name="harga_beli" id="harga_jual" class="form-control" value="0" required >
                <span class="help-block with errors"></span>
              </div>
              </div>
              <div class="form-group row">
                <label for="harga_jual" class="col-md-2 col-md-offset-1 control-label">harga jual</label>
                  <div class="col-md-6">
                    <input type="number" name="harga_jual" id="harga_jual" class="form-control" required >
                  <span class="help-block with errors"></span>
                </div>
                </div>
                <div class="form-group row">
                  <label for="diskon" class="col-md-2 col-md-offset-1 control-label">diskon</label>
                    <div class="col-md-6">
                      <input type="number" name="diskon" id="diskon" class="form-control" value="0" required>
                    <span class="help-block with errors"></span>
                  </div>
                  </div>
                  <div class="form-group row">
                    <label for="stok" class="col-md-2 col-md-offset-1 control-label">stok</label>
                      <div class="col-md-6">
                        <input type="number" name="stok" id="harga_jual" class="form-control" value="0" required >
                      <span class="help-block with errors"></span>
                    </div>
                    </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        </div>
      </div>
    </form>
  </div>
</div>
