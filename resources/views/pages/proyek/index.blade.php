@extends('layout.app')
@section('content')
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <a class="h3 mt-3 text-white text-uppercase d-none d-lg-inline-block" href="#">Proyek</a>
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
          <h3 class="mb-0">
            <a class="btn btn-primary" href="{{url('admin/proyek/create')}}"><i class="fa fa-plus"></i> Tambah</a>
          </h3>
        </div>
        <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Proyek</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Kordinat</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                  <tr>
                    <td> {{$d->nama_proyek}} </td>
                    <td> {{$d->nilai_proyek}} </td>
                    <td> {{$d->jumlah_unit}} </td>
                    <td> {{$d->id_kota}} </td>
                    <td> {{$d->latitude}}, {{ $d->longitude }} </td>
                    <td> 
                      <a href="{{ url('admin/proyek/delete/'.$d->id) }} ">Hapus</a> | 
                      <a href="{{ url('admin/proyek/'.$d->id.'/edit') }}">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
      </div>
    </div>
  </div>
@stop
