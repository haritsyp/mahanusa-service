@extends('layout.app')
@section('content')
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <a class="h3 mt-3 text-white text-uppercase d-none d-lg-inline-block" href="#">Kota</a>
  </div>
</nav>
<div class="header bg-gradient-blue pb-4 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
    </div>
  </div>
</div>
<div class="container-fluid mt--5">
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <h3 class="mb-0">Form Kota</h3>
        </div>
        <div class="card-body py-1">
          <form action="{{ url('admin/kota/'.$data->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
           {{ method_field('PATCH') }} 
           <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly="" name="id" placeholder="ID Kota" value="{{ $data->id }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_kota" placeholder="Nama Kota" value="{{ $data->nama_kota }}">
            </div>
          </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="preview" placeholder="Jumlah Unit" value="{{ $data->preview }}">
                <img src="{{ url('image/'.$data->preview) }}" style="margin-top: 20px; width: 300px;">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" class="btn btn-primary" name="save" value="Simpan">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
