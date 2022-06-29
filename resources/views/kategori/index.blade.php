
@extends('layouts.master')

@section('title')
    Kategori
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kategori</li>    
@endsection

@section('content')
<section class="section dashboard">
    <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <button onclick="addForm()" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-form">Tambah</button>
              <!-- Table with stripped rows -->
              <table class="table ">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th >kategori</th>
                    <th width="15%"><i  class="bx bx-plus-circle"></i></th> 
                  </tr>
                </thead>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
      </div>

      @includeIf('kategori.form')
@endsection

@push('scripts')

