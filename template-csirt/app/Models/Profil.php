<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    // protected $table = 'profils';

    protected $guarded = ['id'];

    public function getRouteKeyName(){
        return 'value';
    }

    public static function getProfileData()
    {
        $profil = self::whereIn('name', [
            'nama', 'alamat', 'telp', 'email', 'maps', 'fb', 'ig', 'instance1', 'instance2', 'instance3', 'deskripsi_profil', 'deskripsi_home', 'link_ticketing'
        ])->get()->pluck('value', 'name');
    
        $properties = ImageProperty::where('property', 'Logo')->latest()->get();
        $keys = Key::latest()->get();
    
        return [
            'profil' => $profil,
            'properties' => $properties,
            'keys' => $keys,
            'nama' => $profil->get('nama'),
            'alamat' => $profil->get('alamat'),
            'telp' => $profil->get('telp'),
            'email' => $profil->get('email'),
            'maps' => $profil->get('maps'),
            'fb' => $profil->get('fb'),
            'ig' => $profil->get('ig'),
            'instance1' => $profil->get('instance1'),
            'instance2' => $profil->get('instance2'),
            'instance3' => $profil->get('instance3'),
            'deskripsi_profil' => $profil->get('deskripsi_profil'),
            'deskripsi_home' => $profil->get('deskripsi_home'),
            'link_ticketing' => $profil->get('link_ticketing'),
        ];
    }

    public static function getProfileName()
    {
        return self::where('name', 'nama')->value('value');
    }
    
}
