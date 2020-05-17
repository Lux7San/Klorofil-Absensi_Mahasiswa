@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Inputs</h3>
								</div>
								<div class="panel-body">
									<form action="/mahasiswa/{{$mahasiswa->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Depan</label>
                                        <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Depan" value="{{$mahasiswa->nama_depan}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Belakang</label>
                                        <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Belakang" value="{{$mahasiswa->nama_belakang}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Pilih Gender</label>
                                        <select name="genre" class="form-control" id="exampleFormControlSelect1">
                                        <option>--Select Genre--</option>
                                        <option value="L" @if($mahasiswa->genre == 'L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if($mahasiswa->genre == 'P') selected @endif>Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Agama</label>
                                        <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Agama" value="{{$mahasiswa->agama}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$mahasiswa->alamat}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Avatar</label>
                                        <input type="file" name="avatar" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Sakit / -Jam</label>
                                        <input name="sakit" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan jumlah Sakit -Jam" value="{{$mahasiswa->nama_depan}}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Ijin / -Jam</label>
                                        <input name="ijin" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan jumlah Ijin -Jam" value="{{$mahasiswa->nama_depan}}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Alpha / -Jam</label>
                                        <input name="alpha" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan jumlah Alpha -Jam" value="{{$mahasiswa->nama_depan}}">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-warning">Update</button>           
                                    </form>
								</div>
							</div>
                    </div>  
                </div>                    
            </div>
        </div>
</div>
@stop