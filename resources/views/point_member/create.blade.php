@extends('layouts.master')

@section('content')

<?php
  $url = file_get_contents('http://127.0.0.1:8000/api/apipointmember');
  $json = json_decode($url,true);
  $user_data = $user;
  $sprint_data = $sprint;
?>
<div class="container card card-frame">
    <div class="row card-group">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pengurangan Point</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('createpointmember') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">

                            <label for="role" class="col-md-4 control-label">Keterangan</label>

                            <div class="col-md-6">
                                <!-- <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus> --}}
                                <select name="role"  class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="dosen">Dosen</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="scrum master">Scrum Master</option>
                                </select> -->
                                <div class="custom-control custom-checkbox mb-3">
                                  <input class="custom-control-input" id="customCheck1" type="checkbox" name="keterangan[]" value="Terlambat Hadir">
                                  <label class="custom-control-label" for="customCheck1">Terlambat Hadir</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                  <input class="custom-control-input" id="customCheck2" type="checkbox" name="keterangan[]" value="Tidak Hadir">
                                  <label class="custom-control-label" for="customCheck2">Tidak Hadir</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                  <input class="custom-control-input" id="customCheck3" type="checkbox" name="keterangan[]" value="Berpakaian tidak sesuai ketentuan">
                                  <label class="custom-control-label" for="customCheck3">Berpakaian tidak sesuai ketentuan</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                  <input class="custom-control-input" id="customCheck4" type="checkbox" name="keterangan[]" value="Tidak mengikuti daily meeting">
                                  <label class="custom-control-label" for="customCheck4">Tidak mengikuti daily meeting</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                  <input class="custom-control-input" id="customCheck5" type="checkbox" name="keterangan[]" value="Tidak mengikuti penuh waktu">
                                  <label class="custom-control-label" for="customCheck5">Tidak mengikuti penuh waktu</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                  <input class="custom-control-input" id="customCheck6" type="checkbox" name="keterangan[]" value="Bermain game dan sosial media">
                                  <label class="custom-control-label" for="customCheck6">Bermain game dan sosial media</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="mahasiswa_id" class="col-md-4 control-label">Nama Mahasiswa</label>

                            <div class="col-md-6">
                                <input id="mahasiswa_id" type="hidden" class="form-control @error('mahasiswa_id') is-invalid @enderror" name="mahasiswa_id" value="{{ old('mahasiswa_id') }}" required autocomplete="mahasiswa_id" autofocus>
                                <select name="mahasiswa_id"  class="form-control">
                                    @foreach ($user_data as $i)
                                        <option value="{{$i->id}}">{{$i->name}}</option>
                                    @endforeach
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
                                <select name="sprint_id"  class="form-control">
                                    @foreach ($sprint_data as $i)
                                        <option value="{{$i->id}}">{{$i->nama}}</option>
                                    @endforeach
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
                                <input id="dosen_scrum_master_id" type="hidden"  name="dosen_scrum_master_id" required value="<?php echo $userId; ?>">
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
@endsection
