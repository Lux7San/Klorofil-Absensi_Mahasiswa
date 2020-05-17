<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class DosenController extends Controller
{
    public function index()
    {
        $client = new Client();
        $request = $client->get('http://localhost/absensi_server/api/dosen');
        $response = $request->getBody();

        $dosen = json_decode($response, true);
        return view('/dosen/index',['dosen' => $dosen]);
    }

    public function add(Request $request)
    {
        $client = Http::post('http://localhost/absensi_server/api/dosen', [
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen
        ]);
        return redirect('/dosen');
    }

    public function delete($id)
    {
        $client = new \GuzzleHttp\Client();
        $client->delete('http://localhost/absensi_server/api/dosen', [
            'form_params' => [
                'nip' => $id
            ]
        ]);
        return redirect('/dosen');
    }
}
