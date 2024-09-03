<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Service;
use Illuminate\Support\Str;
use App\Models\ImageProperty;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Footer;
use App\Models\Category;
use App\Models\Post;
use App\Models\File;
use App\Models\Key;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileData = Profil::getProfileData();
        return view('dashboard.services.index', array_merge([
            'services' => Service::latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
        ], $profileData));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profileData = Profil::getProfileData();
        return view('dashboard.services.create', array_merge([
            'services' => Service::latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
        ], $profileData));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name'],'-');

        Service::create($validatedData);

        return redirect('/dashboard/services')->with('success', 'New Service has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $profileData = Profil::getProfileData();
        return view('dashboard.services.show', array_merge([
            'service' => $service,
            'services' => Service::latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
        ], $profileData));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $profileData = Profil::getProfileData();
        return view('dashboard.services.edit', array_merge([
            'service' => $service,
            'services' => Service::latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
        ], $profileData));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['name'],'-');

        Service::where('id', $service->id)->update($validatedData);

        return redirect('/dashboard/services')->with('success', 'Service has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect('/dashboard/services')->with('success', 'Service has been deleted!');
    }

    public function index1 ()
    {
        $profileData = Profil::getProfileData();

        return view('service', array_merge([
            "includeHero" => false,
            'properties' => ImageProperty::where('property', 'Logo')->latest()->get(),
            'propertiez' => ImageProperty::where('property', 'Banner')->latest()->get(),
            'services' => Service::latest()->get()
        ], $profileData));
    }
}
