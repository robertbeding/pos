
@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">   Dashboard</li>
@endsection

@section('content')
       
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
             <Button onclick="addForm('{{ route('kategori.store') }}')" class="btn btn-success btn-xs btn-flat" ><i class="fa fa-plus-circle"></i>Tambah</Button>
            </div>
        

            <!-- /.box-header -->
            <div class="box-body table-responsive"> 
              {{-- //table-responsive khsusu untuk tambel yang banyak kolomnya agar tabel tidak rusak --}}
                <table class="table table-bordered table-hover">
                    <thead>                       
                            <th>ID </th>
                            <th>Kategori</th>
                            <th widht="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody></tbody>
                </table>
             
            </div>
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row (main row) -->
      

@endsection

@includeIf('kategori.form')


@push('scripts')

<script>
    let table;

    $(function () {
     table = $('.table').DataTable({
      processing:true,
      autoWidth:false,
      ajax: {
        url: '{{ route('kategori.data') }}',
      },
      columns:[ // FUNGSI TAMPIL DATA
        {data:'DT_RowIndex',searchable: false, sortable: false}, // memanggil fungsi data di kategorikontroller yang di gunakan untuk menampilkan ID
        {data:'nama_kategori'},
        {data:'aksi',searchable: false, sortable: false},// memanggil fungsi data di kategorikontroller yang di gunakan untuk menampilkan Aksi
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
   });


   function addForm(url) {
     $('#modal-form').modal('show');
     $('#modal-form .modal-title').text('Tambah Kategori');
     
     $('#modal-form form')[0].reset(); // untuk mereset id="nama_kategori" pada bagian class=modal-body di form.blade.php
     $('#modal-form form').attr('action', url); 
     $('#modal-form [name=_method]').val('post'); // memanggil method post di bawah csrf bagian form.blade.php
     $('#modal-form [name=nama_kategori]').focus();
   }
   function editForm(url) {
     $('#modal-form').modal('show');
     $('#modal-form .modal-title').text('Edit Kategori');
     
     $('#modal-form form')[0].reset(); // untuk mereset id="nama_kategori" pada bagian class=modal-body di form.blade.php
     $('#modal-form form').attr('action', url); 
     $('#modal-form [name=_method]').val('put'); // memanggil method put(PUT UNTUK UPDATE) di bawah csrf bagian form.blade.php
     $('#modal-form [name=nama_kategori]').focus();

     $.get(url)
        .done((response) => {
          $('#modal-form [name=nama_kategori]').val(response.nama_kategori);
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

  </script>
@endpush