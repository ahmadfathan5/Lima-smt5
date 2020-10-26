@extends('layouts.master')

@section('content')

<?php
  $url = file_get_contents('http://127.0.0.1:8000/api/apiprodi/');
  $json = json_decode($url,true);
?>

<div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
  <div class="card card-frame" style="padding-bottom: 100px;">
    <div class="card-header border-0">
      <div class="text-center">
        <h1 class="">Daftar Podi</h1>
      </div>
    </div>
    <div class="row">
      <?php foreach($json as $i){ ?>
      <div class="col-xl-6 col-lg-12">
        <a href="{{url('tim',$i['id'])}}">
          <div class="card my-6 ml-5 mr-2 bg-primary">
            <div class="card-body">
              <h2 class="text-center text-white"><?php echo $i['nama']?></h2>
            </div>
          </div>
        </a>
      </div>
      <?php
      }
      ?>
      <!-- <div class="col-6 items-center px-7">
        <button type="button" class="btn btn-primary px-7">Teknik Informatika</button>
      </div>
      <div class="col-6 align-items-center">
        <button type="button" class="btn btn-primary px-7">Sistem Informasi</button>
      </div> -->
    </div>
  </div>
</div>

@endsection
