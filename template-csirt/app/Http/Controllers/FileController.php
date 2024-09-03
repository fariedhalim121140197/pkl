<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Profil;
use App\Models\ImageProperty;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Footer;
use App\Models\Category;
use App\Models\Post;
use App\Models\Key;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $profileData = Profil::getProfileData();
        return view('dashboard.files.index', array_merge([
            'files' => File::latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
        ], $profileData));
    }

    public function create()
    {
        $profileData = Profil::getProfileData();
        return view('dashboard.files.create', array_merge([
            'files' => File::latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
        ], $profileData));
    }

    public function store(StoreFileRequest $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);
        $fileModel = new File;

        if($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = $request->file->getClientOriginalName();
            $fileModel->path = $filePath;
            $fileModel->save();
            return redirect('/dashboard/files')->with('success', 'File RFC2350 telah diupload!');
        }
    }

    public function destroy(File $file)
    {
        if($file->path) {
            Storage::delete($file->path);
        }
        File::destroy($file->id);

        return redirect('/dashboard/files')->with('success', 'File has been deleted!');
    }

    public function index1 () {
        $profileData = Profil::getProfileData();
        return view('file', array_merge([
            "includeHero" => false,
            'files' => File::latest()->get(),
            'keys' => Key::latest()->get(),
            'propertiez'  => ImageProperty::where('property', 'Banner')->latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get(),
        ], $profileData));
    }
}
