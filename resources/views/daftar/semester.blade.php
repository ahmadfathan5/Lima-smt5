@extends('layouts.master')

@section('content')

<?php
$url = file_get_contents('http://127.0.0.1:8000/api/apidaftarsemester/'.$userId);
$daftar = json_decode($url,true);
$semester = $daftar['semester'];
?>

<div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
  <div class="card card-frame" style="padding-bottom: 100px;">
    <div class="card-header border-0">
      <div class="text-center">
        <h1 class="">Daftar Semester</h1>
      </div>
    </div>
    <!-- Table -->
    <div class="row">
      <div class="col-xl-12">
        <div class="card shadow mx-5 mt-4">
          <div class="d-flex justify-content-start">

          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush table-hover">
              <thead class="thead-light text-center">
                <tr>
                  <th scope="col" class="text-sm text-left">Nama</th>
                  <th scope="col" class="text-sm text-left">Kelompok</th>
                  <th scope="col" class="text-sm text-left">Nilai</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($semester as $i){
                  $semesterId = $i['semester_id'];
                  $timId = $i['tim_id'];
                ?>
                <tr>
                  <td scope="row">
                    <div class="media">
                      <div class="media-body">
                        <span class="mb-0 text-sm"><?php echo $i['namasemester'] ?></span>
                      </div>
                    </div>
                  </td>
                  <td scope="row">
                    <div class="media">
                      <div class="media-body">
                        <span class="mb-0 text-sm"><?php echo $i['namatim'] ?></span>
                      </div>
                    </div>
                  </td>
                  <td scope="row">
                    <div class="media">
                      <div class="media-body">
                        <span class="mb-0 text-sm"><?php echo $i['skor_member'] ?></span>
                      </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <a class=" nav-link active " href="{{url('sprint',[$userId,$timId,$semesterId])}}">
                      <button type="button" class="btn btn-warning btn-sm px-4">Detail</button>
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
</div>

@endsection
