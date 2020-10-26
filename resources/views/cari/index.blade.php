@extends('layouts.master')

@section('content')

<?php
  $nama = str_replace(' ','+', $nama);
  $url = file_get_contents('http://127.0.0.1:8000/api/apiuser/cari/'.$nama.'/'.$role);
  $json = json_decode($url,true);
?>

<div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
  <div class="card card-frame" style="padding-bottom: 100px;">
    <div class="card-header border-0">
      <div class="text-center">
        <h1 class="">Data Mahasiswa</h1>
      </div>
    </div>
    <!-- Table -->
    <div class="row">
      <div class="col-xl-12">
        <div class="card shadow mx-5 mt-4">
          <div class="d-flex justify-content-start">
            <div class="p-2 bd-highlight">
              <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$role }}</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('cari',[$nama,'mahasiswa'])}}">Mahasiswa</a>
                    <a class="dropdown-item" href="{{url('cari',[$nama,'dosen'])}}">Dosen</a>
                    <a class="dropdown-item" href="{{url('cari',[$nama,'admin'])}}">Admin</a>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light text-center">
                <tr>
                  <th scope="col" class="text-sm text-left">Nama</th>
                  <th scope="col" class="text-sm">Prodi</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($json as $i) {?>
                <tr>
                  <td scope="row">
                    <div class="media align-items-center">
                      <div class="media-body">
                        <span class="mb-0 text-sm"> <?php echo $i['name'];?></span>
                      </div>
                    </div>
                  </td>
                  <td scope="row">
                    <div class="media">
                      <div class="media-body text-center">
                        <span class="mb-0 text-sm"><?php echo $i['namaprodi'] ?></span>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <a class=" nav-link active " href="{{url('user',$i['id'])}}">
                      <button type="button" class="btn btn-info btn-sm px-4">Detail Akun</button>
                    </a>
                  </td>
                  <td class="text-right">
                    <a class=" nav-link active" href="{{url('semester',$i['id'])}}">
                      <button type="button" class="btn btn-warning btn-sm px-4">Detail Nilai</button>
                    </a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
