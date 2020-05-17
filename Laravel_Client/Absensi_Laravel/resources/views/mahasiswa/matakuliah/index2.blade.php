@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Matakuliah</h3>
                                    <div class="right">
                                        <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></a>
                                    </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Matakuliah</th>
                                            <th>Nama Matakuliah</th>
                                            <th>SKS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($matakuliah['data'] as $m)
                                        <tr>
                                            <td>{{ $m['id_matakuliah']}}</td>
                                            <td>{{ $m['matakuliah']}}</td>
                                            <td>{{ $m['sks']}} jam</td>
                                            <td>
                                            <a href="/mahasiswa/matakuliah/edit/{{$m['id_matakuliah']}}" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/mahasiswa/matakuliah/delete/{{$m['id_matakuliah']}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin data ini ?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--                                                                        create modal                                                            -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Update Data Matakuliah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- form -->
            <form action="/mahasiswa/matakuliah/add" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Matakuliah</label>
                <input name="matakuliah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Matakuliah">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">SKS / Jam</label>
                <div class="input-group">
                <input name="sks" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Jumlah SKS per-Jam"><span class="input-group-addon">Jam</span></div>
            </div>
            
            <!-- tutup form -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
    </div> 

@stop
