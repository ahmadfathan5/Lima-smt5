@extends('layouts.master')

@section('content')

<?php
  $url = file_get_contents('http://127.0.0.1:8000/api/apipointmember/updatePage/'.$userId.'/'.$sprintId.'/'.$timmemberId.'/'.$timId.'/'.$semesterId);
  $json = json_decode($url,true);
  $user = $json['user'];
  $sprint = $json['sprint'];
  $point_member = $json['point_member'];
  $timId = $json['tim_id'];
  $semesterId = $json['semester_id'];
?>

<div class="container card card-frame">
  <div class="row card-group">
    <div class="col-xl-12">
      <div class="mx-5 mt-4">
        <div class="panel panel-default">
          <div class="card-header border-0">
            <div class="text-center">
              <h1 class="">Pengurangan Point</h1>
            </div>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{url('http://127.0.0.1:8000/api/apipointmember/'.$userId.'/'.$sprintId.'/'.$timmemberId.'/'.$timId.'/'.$semesterId)}}">
                {{ csrf_field() }}

                <div class="form-group row">

                    <label for="role" class="col-md-4 control-label">Keterangan</label>

                    <div class="col-md-6">
                        <?php
                          $keterangan = explode(',',$point_member['keterangan']);
                        ?>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="customCheck1" type="checkbox" name="keterangan[]" value="Terlambat Hadir"
                            <?php foreach($keterangan as $i){
                                  if($i === "Terlambat Hadir"){
                                    echo "checked";
                                }
                              }?>>
                          <label class="custom-control-label" for="customCheck1">Terlambat Hadir</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="customCheck2" type="checkbox" name="keterangan[]" value="Tidak Hadir"
                          <?php foreach($keterangan as $i){
                            if($i === "Tidak Hadir"){
                              echo "checked";
                            }
                          }?>>
                          <label class="custom-control-label" for="customCheck2">Tidak Hadir</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="customCheck3" type="checkbox" name="keterangan[]" value="Berpakaian tidak sesuai ketentuan"
                          <?php foreach($keterangan as $i){
                            if($i === "Berpakaian tidak sesuai ketentuan"){
                              echo "checked";
                            }
                          }?>>
                          <label class="custom-control-label" for="customCheck3">Berpakaian tidak sesuai ketentuan</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="customCheck4" type="checkbox" name="keterangan[]" value="Tidak mengikuti daily meeting"
                          <?php foreach($keterangan as $i){
                            if($i === "Tidak mengikuti daily meeting"){
                              echo "checked";
                            }
                          }?>>
                          <label class="custom-control-label" for="customCheck4">Tidak mengikuti daily meeting</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="customCheck5" type="checkbox" name="keterangan[]" value="Tidak mengikuti penuh waktu"
                          <?php foreach($keterangan as $i){
                            if($i === "Tidak mengikuti penuh waktu"){
                              echo "checked";
                            }
                          }?>>
                          <label class="custom-control-label" for="customCheck5">Tidak mengikuti penuh waktu</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" id="customCheck6" type="checkbox" name="keterangan[]" value="Bermain game dan sosial media"
                          <?php foreach($keterangan as $i){
                            if($i === "Bermain game dan sosial media"){
                              echo "checked";
                            }
                          }?>>
                          <label class="custom-control-label" for="customCheck6">Bermain game dan sosial media</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">

                    <label for="mahasiswa_id" class="col-md-4 control-label">Nama Mahasiswa</label>

                    <div class="col-md-6">
                        <input id="mahasiswa_id" type="hidden" class="form-control @error('mahasiswa_id') is-invalid @enderror" name="mahasiswa_id" value="{{ old('mahasiswa_id') }}" required autocomplete="mahasiswa_id" autofocus>

                        <select name="mahasiswa_id"  class="form-control" disabled>

                                <option value="{{$user['id']}}">{{$user['name']}}</option>

                        </select>

                        @if ($errors->has('mahasiswa_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mahasiswa_id') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">

                    <label for="sprint_id" class="col-md-4 control-label">Sprint</label>

                    <div class="col-md-6">
                        <input id="sprint_id" type="hidden" class="form-control @error('sprint_id') is-invalid @enderror" name="sprint_id" value="{{ old('sprint_id') }}" required autocomplete="sprint_id" autofocus>
                        <select name="sprint_id"  class="form-control" disabled>

                                <option value="{{$sprint['id']}}">{{$sprint['nama']}}</option>

                        </select>

                        @if ($errors->has('sprint_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sprint_id') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="dosen_scrum_master_id" type="hidden"  name="dosen_scrum_master_id" required value="{{$currentUser['id']}}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="user_id" type="hidden"  name="mahasiswa_id" required value="{{$user['id']}}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="sprint_id" type="hidden"  name="sprint_id" required value="{{$sprint['id']}}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="redirect_url" type="hidden"  name="redirect_url" required value="{{url('http://localhost/ti1-link-and-match/projectlima/public/sprint/'.$userId.'/'.$timId.'/'.$semesterId)}}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
