@extends('layouts.master')

@section('content')

<?php
  $namaTim =  $nama;
  $json = $user;
?>

<div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
  <div class="card card-frame" style="padding-bottom: 100px;">
    <div class="card-header border-0">
      <div class="text-center">
        <h1 class="">Daftar Mahasiswa</h1>
        <h2>Kelompok {{$nama}}</h2>

      </div>
    </div>
    <!-- Table -->
    <div class="row">
      <div class="col-xl-12">
        <div class="card shadow mx-5 mt-4">
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light text-center">
                <tr>
                  <th scope="col" class="text-sm">Nama</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($json as $i){ ?>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div class="media-body">
                        <span class="mb-0 text-sm"><?php echo $i['name'] ?></span>
                      </div>
                    </div>
                  </th>
                  <td class="text-right">
                    <a class=" nav-link active " href="{{url('sprint',$i['id'])}}">
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
