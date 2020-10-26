@extends('layouts.master_point_member')

@section('content')

<?php
  $url = file_get_contents('http://127.0.0.1:8000/api/apidaftarsprint/'.$userId.'/'.$timId.'/'.$semesterId);
  $json = json_decode($url,true);
  $userId = $json['user_id'];
  $namaUser = $json['nama'];
  $sprint = $json['sprint'];
?>

<div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
  <div class="card card-frame" style="padding-bottom: 100px;">
    <div class="card-header border-0">
      <div class="text-center">
        <h1 class="">Daftar Point Mahasiswa Per Sprint</h1>
        <h2>{{$namaUser['name']}}</h2>
      </div>
    </div>
    <!-- Table -->
    <div class="row">
      <div class="col-xl-3 col-md-12 ">

      </div>
      <div class="col-xl-3 col-md-12">
        <div class="card shadow">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">individu  </h5>
                <span class="h2 font-weight-bold mb-0">
                  <?php
                  $count = 0;
                  $avg = 0;
                  foreach ($sprint as $i) {
                    $avg = $avg + $i['nilai']+$i['point'];
                    $count++;
                  }
                  if ($count==0) {
                    $avg=0;
                    echo $avg;
                  }
                  else {
                    $avg = $avg/$count;
                    $avg = number_format($avg,2);
                    echo $avg;
                  }
                  ?>
                </span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                  <i class="ni ni-single-02"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-12">
        <div class="card shadow">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Kelompok</h5>
                <span class="h2 font-weight-bold mb-0">
                  <?php
                  $count = 0;
                  $avg = 0;
                  foreach ($sprint as $i) {
                    $avg = $avg + $i['nilai'];
                    $count++;
                  }
                  if ($count==0) {
                    $avg=0;
                    echo $avg;
                  }
                  else {
                    $avg = $avg/$count;
                    $avg = number_format($avg,2);
                    echo $avg;
                  }
                  ?>
                </span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                  <i class="ni ni-chart-bar-32"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-12">

      </div>
      <div class="col-xl-12">
        <div class="card shadow mx-5 mt-4">
          <div class="table-responsive">
            <table class="table align-items-center table-flush table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-sm text-left">Sprint</th>
                  <th scope="col" class="text-sm text-center">point</th>
                  <th scope="col" class="text-sm text-center">nilai kelompok</th>
                  <th scope="col" class="text-sm text-center">nilai individu</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach($sprint as $i){ ?>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div class="media-body">
                        <span class="mb-0 text-sm"><?php echo $i['nama'] ?></span>
                      </div>
                    </div>
                  </th>
                  <th scope="row">
                    <div class="media-body text-center">
                      <span class="mb-0 text-sm"><?php echo $i['point'] ?></span>
                    </div>
                  </th>
                  <th scope="row">
                    <div class="media-body text-center">
                      <span class="mb-0 text-sm"><?php echo $i['nilai'] ?></span>
                    </div>
                  </th>
                  <th scope="row">
                    <div class="media-body text-center">
                      <span class="mb-0 text-sm"><?php echo $i['nilai']+$i['point'] ?></span>
                    </div>
                  </th>
                  <td class="pl-5 pr-0 py-2">
                    <a id="button-edit-point-<?php echo $i['point_member_id'] ?>" class=" nav-link active button-edit-point" href="#" data-toggle="modal" data-target="#ModalDetail" data-id="<?php echo $i['point_member_id'] ?>" data-point="<?php echo $i['point'] ?>" data-keterangan="<?php echo $i['keterangan'] ?>">
                      <button class="btn btn-warning btn-sm px-3 mr-0" type="button">Detail</button>
                    </a>
                  </td>
                  <td class="px-1 py-2">
                    <a class=" nav-link active open-modaledit" href="{{route('updatepointmember',[$userId,$i['sprint_id'],$i['tim_member_id'],$timId,$semesterId])}}">
                      <button class="btn btn-warning btn-sm px-4 ml-0 mr-3" type="button">Edit</button>
                    </a>
                  </td>
                </tr>
                <?php
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal email -->
  <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-edit">
        <form class="col-md-12">
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="table-detail">
                <thead>
                  <tr>
                    <th scope="col" class="text-sm">
                      <h3>Sprint 1</h3>
                      <span><h6>selasa,1 okt 2019</h6></span>
                    </th>
                    <th scope="col" class="text-right">
                      <span><h5>admin 1</h5></span>
                    </th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                  <tr>
                    <th scope="col" class="text-sm">
                      <h3>Total</h3>
                    </th>
                    <th scope="col" class="text-right" id="total-point">
                      <h3></h3>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="form-group modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end modal email -->
</div>

@endsection
