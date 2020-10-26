@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">

                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">{{--
                                <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus> --}}
                                <select name="role"  class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="dosen">Dosen</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="scrum master">Scrum Master</option>
                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nim') ? ' has-error' : '' }}">
                            <label for="nim" class="col-md-4 control-label">NIM</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control" name="nim" value="{{ old('nim') }}">

                                @if ($errors->has('nim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nidn') ? ' has-error' : '' }}">
                            <label for="nidn" class="col-md-4 control-label">NIDN</label>

                            <div class="col-md-6">
                                <input id="nidn" type="text" class="form-control" name="nidn" value="{{ old('nidn') }}">

                                @if ($errors->has('nidn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nidn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tlahir') ? ' has-error' : '' }}">
                            <label for="tlahir" class="col-md-4 control-label">Tempat Lahir</label>

                            <div class="col-md-6">
                                <input id="tlahir" type="text" class="form-control" name="tlahir" value="{{ old('tlahir') }}" >

                                @if ($errors->has('tlahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tlahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgllahir') ? ' has-error' : '' }}">
                            <label for="tgllahir" class="col-md-4 control-label">Tanggal lahir</label>

                            <div class="col-md-6">
                                <input id="tgllahir" type="date" class="form-control" name="tgllahir" value="{{ old('tgllahir') }}">

                                @if ($errors->has('tgllahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgllahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nohp') ? ' has-error' : '' }}">
                            <label for="nohp" class="col-md-4 control-label">No. Handphone</label>

                            <div class="col-md-6">
                                <input id="nohp" type="text" class="form-control" name="nohp" value="{{ old('nohp') }}" >

                                @if ($errors->has('nohp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nohp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('semester') ? ' has-error' : '' }}">
                            <label for="semester" class="col-md-4 control-label">Semester</label>

                            <div class="col-md-6">
                                <input id="semester" type="text" class="form-control" name="semester" value="{{ old('semester') }}"  autofocus>

                                @if ($errors->has('semester'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kelompok') ? ' has-error' : '' }}">
                            <label for="kelompok" class="col-md-4 control-label">Kelompok</label>

                            <div class="col-md-6">
                                <input id="kelompok" type="text" class="form-control" name="kelompok" value="{{ old('kelompok') }}"  autofocus>

                                @if ($errors->has('kelompok'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelompok') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">{{--
                                <input id="gender" type="text" class="form-control @error('name') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus> --}}
                                <select name="gender"  class="form-control">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>

                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="prodi_id" class="col-md-4 control-label">Prodi</label>

                            <div class="col-md-6">{{--
                                <input id="prodi_id" type="text" class="form-control @error('name') is-invalid @enderror" name="prodi_id" value="{{ old('prodi_id') }}" required autocomplete="prodi_id" autofocus> --}}
                                <select name="prodi_id"  class="form-control">
                                    <option value="1">Teknik Informatika</option>
                                    <option value="2">Sistem Informasi</option>

                                </select>

                                @if ($errors->has('prodi_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prodi_id') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
