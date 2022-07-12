@extends('layouts.master')

@section('title')
    Daftar Makanan
@endsection

@section('breadcrumb')
    @parent
    <li class="active">   Daftar Makanan</li>
@endsection

@section('content')
       
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="btn-group">

                <Button onclick="addForm('{{ route('produk.store') }}')" class="btn btn-success btn-xs btn-flat" ><i class="fa fa-plus-circle"></i>Tambah</Button>
                <Button onclick="deleteterpilih('{{ route('produk.deleteterpilih') }}')" class="btn btn-danger btn-xs btn-flat" ><i class="fa fa-trash"></i>Hapus</Button>
                <Button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')" class="btn btn-info btn-xs btn-flat" ><i class="fa fa-trash"></i>Cetak Barcode</Button>
            
              </div>
            </div>
        

            <!-- /.box-header -->
            <div class="box-body table-responsive"> 
              <form action="" class="form-produk" method="post">
                @csrf
                {{-- //table-responsive khsusu untuk tambel yang banyak kolomnya agar tabel tidak rusak --}}
                <table class="table table-bordered table-hover">
                  <thead>                       
                    <th><input type="checkbox" name="select_all" id="select_all"></th>
                          <th>No </th>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Kategori</th>
                          <th>Merk</th>
                          <th>Harga Beli</th>
                          <th>Harga Jual</th>
                          <th>Diskon</th>
                          <th>Stok</th>
                          <th widht="15%"><i class="fa fa-cog"></i></th>
                  </thead>
                  <tbody></tbody>
              </table>
              </form>
             
            </div>
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row (main row) -->

@includeIf('produk.form')
@endsection
@push('scripts')
<script>
    let table;

    $(function () {
     table = $('.table').DataTable({
      processing:true,
      autoWidth:false,
      ajax: {
        url: '{{ route('produk.data') }}',
      },
      columns:[ // menampilkan data pada tabel
      {data:'select_all'},
        {data:'DT_RowIndex',searchable: false, sortable: false}, // memanggil fungsidata di kategorikontroller yang di gunakan untuk menampilkan data
        {data:'kode_produk'},
        {data:'nama_produk'},
        {data:'nama_kategori'},
        {data:'merk'},
        {data:'harga_beli'},
        {data:'harga_jual'},
        {data:'diskon'},
        {data:'stok'},
        {data:'aksi',searchable: false, sortable: false},// memanggil fungsidata di kategorikontroller yang di gunakan untuk menampilkan Aksi
      ]
      });
      $('#modal-form').validator().on('submit', function (e) {
        if (! e.preventDefault()) {

          $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
          .done((response) => {
            $('#modal-form').modal('hide');
            table.ajax.reload();
          })
          .fail((errors) => {
            alert('tidak dapat simpan data!');
            return;
          });
        }
      })
      // fungsi dibawah ini algotrimanya adalah jika kita mengklik tombol check all maka seluruh data akan terchecked
      $('[name=select_all]').on('click', function () {
            $(':checkbox').prop('checked', this.checked);
      });
   
  });

  

   function addForm(url) {
     $('#modal-form').modal('show');
     $('#modal-form .modal-title').text('Tambah Produk');
     
     $('#modal-form form')[0].reset(); // untuk mereset id="nama_kategori" pada bagian class=modal-body di form.blade.php
     $('#modal-form form').attr('action', url); 
     $('#modal-form [name=_method]').val('post'); // memanggil method post di bawah csrf bagian form.blade.php
     $('#modal-form [name=nama_produk]').focus();
   }
   function editForm(url) {
     $('#modal-form').modal('show');
     $('#modal-form .modal-title').text('Edit Produk');
     
     $('#modal-form form')[0].reset(); // untuk mereset id="nama_kategori" pada bagian class=modal-body di form.blade.php
     $('#modal-form form').attr('action', url); 
     $('#modal-form [name=_method]').val('put'); // memanggil method put(PUT UNTUK UPDATE) di bawah csrf bagian form.blade.php
     $('#modal-form [name=nama_produk]').focus();

     $.get(url)
        .done((response) => {
          $('#modal-form [name=nama_produk]').val(response.nama_produk);
          $('#modal-form [name=id_kategori]').val(response.id_kategori);
          $('#modal-form [name=merk]').val(response.merk);
          $('#modal-form [name=harga_beli]').val(response.harga_beli);
          $('#modal-form [name=harga_jual]').val(response.harga_jual);
          $('#modal-form [name=diskon]').val(response.diskon);
          $('#modal-form [name=stok]').val(response.stok);
        })
        .fail((errors) =>{
          alert('tidak menampikan data');
          return;
        });
   }
   function deleteData(url) {
    if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {

                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
      }
      function deleteterpilih(url) {
    
            if($('input:checked').length > 1) { // fungsi melakukan pengecekekan misalkan data yang di ceklis lebih dari 1 maka benar dan akan masuk ke fungsi menanyakan menghapus data
              if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, $('.form-produk').serialize()) // menjalankan fungsi di class form-prduk
              .done((response) => {
                table.ajax.reload();
              })
              .fail((errors) => {
                alert('data tidak dapat terhapus!');
                return;
              });
              }
            }else{
              alert('Minimal 2 Data');
              return;
            }
      }

      function cetakBarcode(url) {
        if ($('input:checked').length < 1){ //melakukan pengecekan jika input kurang dari 1 maka
          alert('Pilih Data yang akan di cetak'); // maka muncul notifikasi pilih data
          return;
        }else if($('input:checked').length < 3){// melakukan pengecekan jika input kurang dari 3 maka
        alert('Minimal 3 data untuk di cetak');// maka muncul notifikasi pilih 3 data
        return;
        } else{
          $('.form-produk')// jika yang dimasukan benar maka akan menjalankan class= form-produk,
          .attr('target','_blank') // dan membuka tap baru 
          .attr('action', url)
          .submit();
        }
      }

          
      
  </script>
@endpush 