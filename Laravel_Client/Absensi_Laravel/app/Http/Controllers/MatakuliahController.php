<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatakuliahController extends Controller
{
    public function index2()
    {
        $client = new Client();
        $request = $client->get('http://localhost/absensi_server/api/matakuliah');
        $response = $request->getBody();

        $matakuliah = json_decode($response, true);
        return view('/mahasiswa/matakuliah/index2',['matakuliah' => $matakuliah]);
    }

    public function add(Request $request)
    {
        $client = Http::post('http://localhost/absensi_server/api/matakuliah', [
            'matakuliah' => $request->matakuliah,
            'sks' => $request->sks
        ]);
        return redirect('/mahasiswa/matakuliah/');
    }

    public function edit($id)
    {
        $client = new Client();
        $request = $client->get('http://localhost/absensi_server/api/matakuliah?id_matakuliah=' . $id);
        $response = $request->getBody();
        $matakuliah = json_decode($response, true);

        return view('/mahasiswa/matakuliah/edit', ['matakuliah' => $matakuliah]);
    }

    public function update(Request $request)
    {
        $client = new Client();
        $client->request('PUT', 'http://localhost/absensi_server/api/matakuliah', [
            'form_params' => [
                'id_matakuliah' => $request->id_matakuliah,
                'matakuliah' => $request->matakuliah,
                'sks' => $request->sks
            ]
        ]);
        return redirect('/mahasiswa/matakuliah/');
    }

    public function delete($id)
    {
        $client = new \GuzzleHttp\Client();
        $client->delete('http://localhost/absensi_server/api/matakuliah', [
            'form_params' => [
                'id_matakuliah' => $id
            ]
        ]);
        return redirect('/mahasiswa/matakuliah');
    }
}
