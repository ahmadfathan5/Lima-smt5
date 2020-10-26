@extends('layouts.master')

@section('content')

<div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
  <div class="">
    <div class="card card-frame">
      <!-- foto -->
      <div class="card-group">
        <div class="col-lg-5 col-md-5 col-sm-12">
          <div class="card-body profil">
            <img class="rounded-box img-center img-fluid shadow foto" src="/ti1-link-and-match/projectlima/public{{Storage::url($currentUser['foto'])}}">
            <div class="col text-center tombol ">
              <button class="btn btn-icon btn-primary" data-toggle="modal" data-target="#ModalFoto" type="button">
                <span class="btn-inner--icon"><i class="ni ni-settings-gear-65"></i></span>
              </button>
              <h5 class="h4">
                <span class="d-block mb-1">Nomor Induk Mahasiswa</span>
                <small class="h4 font-weight-light text-mute"><?php echo $currentUser['nim'].'<br/>'; ?></small>
              </h5>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12">
          <div class="">
            <div class="text-center mt-5">
              <span class="badge badge-default text-white">MAHASISWA</span>
              <h1>
                <?php echo $currentUser['name'].'<br/>'; ?>
              </h1>
            </div>
            <div class="text-left mx-4 mb-5 mt-4">
              <div class="  ">
                <span class="description">Tempat, Tanggal Lahir</span>
                <br> <span class="heading"><?php echo $currentUser['tlahir']; ?>, <?php echo $currentUser['tgllahir'].'<br/>'; ?></span>
              </div>
              <div class="  ">
                <span class="description">Prodi</span>
                <br> <span class="heading"> <?php if($currentUser['prodi_id']==1){ echo "Informatika"; }else {echo "Sistem Informasi";} ?></span>
              </div>
              <div class="  ">
                <span class="description">Gender</span>
                <br> <span class="heading"> <?php echo $currentUser['gender'].'<br/>'; ?></span>
              </div>
              <div class="  ">
                <span class="description">Email <a href="#" data-toggle="modal" data-target="#ModalEmail"><i class="ni ni-settings-gear-65"></i></a></span>
                <br> <span class="heading"> <?php echo $currentUser['email'].'<br/>'; ?></span>
              </div>
              <div class="  ">
                <span class="description">Nomor Handphone <a href="#" data-toggle="modal" data-target="#ModalNomor"><i class="ni ni-settings-gear-65"></i></a></span>
                <br> <span class="heading"> <?php echo $currentUser['nohp'].'<br/>'; ?></span>
              </div>
              <div class="  ">
                <span class="description">Semester</span>
                <br> <span class="heading"> <?php echo $currentUser['semester'].'<br/>'; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- endfoto -->
      <!-- biodata -->
    </div>
      <!-- endbiodata -->
    </div>
    <!-- Modal -->
    <!-- modal email -->
    <div class="modal fade" id="ModalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Ganti Email</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="col-md-12" action="<?php echo URL::to('/')."/api/apiuser/".$id;?>" method="POST">
            <div class="modal-body">
                <!-- Rendered blade HTML form use this hidden. Dont forget to put the form method to POST -->
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                  <input type="email" class="form-control input-lg" value="<?php echo $currentUser['email']?>" placeholder="type email" name="email"></textarea>
                </div>
            </div>
            <div class="form-group modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit" value="Edit">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end modal email -->
    <!-- modal nomor -->
    <div class="modal fade" id="ModalNomor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Ganti Nomor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="col-md-12" action="<?php echo URL::to('/')."/api/apiuser/".$id;?>" method="POST">
            <div class="modal-body">
              <!-- Rendered blade HTML form use this hidden. Dont forget to put the form method to POST -->
              <input name="_method" type="hidden" value="PUT">
              <div class="form-group">
                <input type="text" class="form-control input-lg" value="<?php echo $currentUser['nohp']?>" placeholder="type nomor handphone" name="nohp"></textarea>
              </div>
            </div>
            <div class="form-group modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit" value="Edit">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end modal nomor -->
    <!-- modal foto -->
    <div class="modal fade" id="ModalFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Ganti Nomor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

            <form class="col-md-12" action="<?php echo URL::to('/')."/api/apiuser/".$id;?>" method="POST" enctype="multipart/form-data" >
              <div class="modal-body">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                  <b> Upload Hasil </b> <br>
                  <input type="file" name="file">
                </div>
              </div>
              <div class="form-group modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" value="Edit">Save changes</button>
              </div>
            </form>
            <!-- <div class="dropzone dropzone-single mb3 dz-clickable" data-toggle="dropzone" data-dropzone-url="http://">
              <div class="dz-preview dz-preview-single"></div>
              <div class="dz-default dz-message">
                <span>Drop files here to upload</span>
              </div>
            </div> -->
        </div>
      </div>
    </div>
    <!-- end modal foto -->
    <!-- endModal -->
  </div>
<!-- </div> -->
@endsection
