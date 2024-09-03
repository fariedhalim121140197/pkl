<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Profil;
use App\Models\Category;
use App\Models\Post;
use App\Models\File;
use App\Models\Key;
use App\Models\ImageProperty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profileData = Profil::getProfileData();

        return view('home', array_merge([
            "includeHero" => true,
            'categories' => Category::all(),
            'posts' => Post::where('published', true)->latest()->get(),
            'files' => File::latest()->get(),
            'keys' => Key::latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get(),
            'propertiez' => ImageProperty::where('property', 'Banner')->latest()->get()
        ], $profileData));
    }
}
