<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index(Request $request)
    {
        // dd(session('email'));
        $LinkHalamanLogin = 'http://127.0.0.1:8001/';
        // $LinkHalamanLogin = 'http://127.0.0.1:8000/';
        // Data yang ingin dienkripsi
        $dataToEncrypt = [
            // 'kode_aplikasi' => 'SI253', // coba SI836
            'kode_aplikasi' => 'SI028', // coba SI836
            'url' => url('/'),
        ];

        // Enkripsi data menggunakan base64
        $encryptedData = base64_encode(json_encode($dataToEncrypt));

        // Menyematkan data langsung pada URL
        $redirectUrl = $LinkHalamanLogin . '?web=' . urlencode($encryptedData);

        // Redirect ke URL yang disematkan data
        return redirect()->away($redirectUrl);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Data yang ingin dienkripsi
        // $redirectUrl = 'http://server.lampungselatankab.go.id/login'; // URL tujuan yang ingin Anda arahkan

        // return redirect()->away($redirectUrl);
        return redirect()->route('login')->with(['success' => 'Berhasil logout!']); // Ganti dengan rute setelah login berhasil

        // return redirect()->route('/')->with(['success' => 'Berhasil logout!']); // Ganti dengan rute setelah login berhasil
    }
}
