@extends('layouts.main')

@section('container')
    <!-- Service Section -->
    <div class="container" style="margin-top:4rem">
        <div class="row justify-content mb-5">
            <section id="blog">
                <div class="row mb-3">
                    <div class="col-md-10 mx-auto text-center">
                        <h1 class="display-5">Layanan {{ $nama }}</h1>
                    </div>
                </div>
                <div class="container">
                    <div class="card flex rounded-lg">
                    </div>
                </div> 
            </section>
                            
            <article class="fs-3">
                <section id="about-lampung" class="about-lampung pt-10 pb-20 bg-gray-100">
                    <div class="about-lampung-content max-w-6xl mx-auto px-4 sm:px-6 lg:px-8" data-sr-id="2" style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: opacity 1s cubic-bezier(0.5, 0, 0, 1) 0.2s, transform 1s cubic-bezier(0.5, 0, 0, 1) 0.2s;">
                        <div class="description" style="text-align: justify;">
                            <p class="text-lg leading-relaxed text-gray-700">
                            @foreach ($services->take(1) as $service)
                                {!! $service->content !!}
                            @endforeach
                            </p>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </div> 
    <!-- End Service Section -->
@endsection
