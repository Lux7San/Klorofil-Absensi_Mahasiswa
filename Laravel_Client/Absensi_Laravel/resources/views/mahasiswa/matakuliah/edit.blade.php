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
                                @foreach($matakuliah['data'] as $m)
                                    <form action="/mahasiswa/matakuliah/update/{{$m['id_matakuliah']}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Matakuliah</label>
                                        <input name="matakuliah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Matakuliah" value="{{$m['matakuliah']}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">SKS / Jam</label>
                                        <div class="input-group">
                                        <input name="sks" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Jumlah SKS per-Jam" value="{{$m['sks']}}"><span class="input-group-addon">Jam</span></div>
                                    </div>
                                    @endforeach
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