@extends('layouts.main')

@section('container')
    <!-- Profil Section -->
    <div class="container" style="margin-top:4rem">
        <div class="row justify-content mb-5">
            <section id="blog">
                <div class="row mb-3">
                    <div class="col-md-10 mx-auto text-center">
                        <h1 class="display-5">Profil {{ $nama }}</h1>
                    </div>
                </div>
                <hr class="mx-auto" style="width: 100%">
            </section>

            <article class="fs-3">
                <section class="pt-10 pb-20 bg-gray-100">
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8" data-sr-id="2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                            <div class="description" style="text-align: justify;">
                                <p class="text-lg leading-relaxed text-gray-700">
                                    {{ $deskripsi_profil }}
                                </p>
                            </div>  
                            <div class="image">
                                @if ($gambar->count() > 0)
                                    <img src="{{ asset('storage/' . $gambar->first()->image) }}" class="img-fluid w-100" alt="Profil Image">
                                @else
                                    <p>No Profil image available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </div> 
    <!-- End Profil Section -->
@endsection
