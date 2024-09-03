<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Footer;
use App\Models\Profil;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ImageProperty;
use App\Http\Requests\StoreFooterRequest;
use App\Http\Requests\UpdateFooterRequest;

class FooterController extends Controller
{

    function getDataRun()
    {
        $data = [
            'nama' => Profil::where('name', 'nama')->value('value'),
            'alamat' => Profil::where('name', 'alamat')->value('value'),
            'telp' => Profil::where('name', 'telp')->value('value'),
            'email' => Profil::where('name', 'email')->value('value'),
            'maps' => Profil::where('name', 'maps')->value('value'),
            'fb' => Profil::where('name', 'fb')->value('value'),
            'ig' => Profil::where('name', 'ig')->value('value'),
            'instance1' => Profil::where('name', 'instance1')->value('value'),
            'instance2' => Profil::where('name', 'instance2')->value('value'),
            'instance3' => Profil::where('name', 'instance3')->value('value'),
        ];
        return $data;
    }

    public function index()
    {
        $data['footers'] = Footers::all();

        $data = array_merge($data, $this->getDataRun());
// dd('ttes');
        return view('admin.main.footers.index', compact('data'));
    }

  



}

























    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // // public function index()
    // // {
    // //     return view('dashboard.footers.index', [
    // //         'profils' => Profil::latest()->get(),
    // //         'posts' => Post::latest()->get(),
    // //         'footers' => Footer::latest()->get(),
    // //         'categories' => Category::all(),
    // //         'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
    // //     ]);
    // // }


    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('dashboard.footers.create', [
    //         'profils' => Profil::latest()->get(),
    //         'footers' => Footer::latest()->get(),
    //         'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
    //     ]);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreFooterRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreFooterRequest $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'address' => 'required|regex:/[a-zA-Z]+.*([a-zA-Z]+( [a-zA-Z]+)+)/',
    //         'maps' => [
    //             'required',
    //             'regex:/(https|http):\/\/(www\.|)google\.[a-z]+\/maps/'
    //         ],
    //         'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //         'email' => 'required|email:dns'
    //     ]);

    //     $validatedData['name'] = strip_tags($validatedData['name']);

    //     $validatedData['maps'] = strip_tags($validatedData['maps'],'<iframe>');

    //     $validatedData['slug'] = Str::slug($validatedData['name'],'-');

    //     Footer::create($validatedData);

    //     return redirect('/dashboard/footers')->with('success', 'Footer has been added!');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Footer  $footer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Footer $footer)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Footer  $footer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Footer $footer)
    // {
    //     return view('dashboard.footers.edit', [
    //         'profils' => Profil::latest()->get(),
    //         'footer' => $footer,
    //         'footers' => Footer::all(),
    //         'properties' => ImageProperty::where('property', 'Logo')->latest()->get()
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateFooterRequest  $request
    //  * @param  \App\Models\Footer  $footer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateFooterRequest $request, Footer $footer)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'address' => 'required|regex:/[a-zA-Z]+.*([a-zA-Z]+( [a-zA-Z]+)+)/',
    //         'maps' => [
    //             'required',
    //             'regex:/(https|http):\/\/(www\.|)google\.[a-z]+\/maps/'
    //         ],
    //         'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //         'email' => 'required|email:dns'
    //     ]);

    //     $validatedData['name'] = strip_tags($validatedData['name']);

    //     $validatedData['maps'] = strip_tags($validatedData['maps'],'<iframe>');

    //     $validatedData['slug'] = Str::slug($validatedData['name'],'-');

    //     Footer::where('id', $footer->id)->update($validatedData);

    //     return redirect('/dashboard/footers')->with('success', 'Footer has been updated!');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Footer  $footer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Footer $footer)
    // {
    //     $footer->delete();

    //     return redirect('/dashboard/footers')->with('success', 'Footer has been deleted!');
    // }
