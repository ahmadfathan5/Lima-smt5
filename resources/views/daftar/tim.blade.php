@extends('layouts.master')

@section('content')

<?php
  $json = $tim;
?>


<div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
  <div class="card card-frame" style="padding-bottom: 100px;">
    <div class="card-header border-0">
      <div class="text-center">
        <h1>Daftar Tim</h1>
      </div>
    </div>
    <?php foreach($json as $i){ ?>
    <div class="col-xl-12 col-lg-12 px-9 my-2">
      <a href="{{url('tim_member',$i['id'])}}">
        <div class="card bg-primary">
          <h3 class="text-center text-white mt-1"><?php echo $i['nama']?></h3>
        </div>
      </a>
    </div>
    <?php
    }
    ?>
  </div>
</div>

@endsection
