<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->query('web');
        if ($data) {
            // if (session('email') === null) {
            if (session('username_log') === null) { // coba
                // if (session('nip') === null) {
                $data = $request->query('web');
                // $urlen = $request->query('url');
                $dedata = json_decode(base64_decode(urldecode($data)), true);

                $request->session()->put('api_kode_user', $dedata['kode_user']); // coba
                $request->session()->put('username_log', $dedata['username_log']); // coba
                $request->session()->put('email', $dedata['email']);
                $request->session()->put('nama_lengkap', $dedata['nama_lengkap']);
                $request->session()->put('foto_user', $dedata['foto_user']);
                $request->session()->put('role_user', $dedata['role_user']);
                $request->session()->put('url', $dedata['url']);
            }
        }
        // Pengecekan apakah pengguna yang mengakses memiliki peran 'admin'
        // if (session('email') == null) {
        if (session('username_log') == null) { //coba
            // if (session('nip') == null) {
            // Jika bukan admin, redirect atau ambil tindakan yang sesuai
            return redirect('/')->with('aksesfail', 'Akses ditolak! Anda belum login.');
        }
        $role_user = session('role_user');

        // Redirect ke dashboard sesuai peran
        // return redirect()->route('dashboard', ['role_user' => $role_user]);
        return redirect()->to('dashboard/' . $role_user);
    }
}
