@extends('layouts.main')

@section('container')
    <!-- Contact Section -->
    <div class="container" style="margin-top:8rem">
        <div class="row justify-content mb-5">
            <!-- <div class="col-md-10"> -->
            <div>
                <h1 class="mb-3">Hubungi Kami</h1>
  
                <article class="my-1 fs-10" style="width: 100%">
                @foreach ($keys->take(1) as $key)   
                        @foreach ($footers->take(1) as $footer)
                            <p>Lokasi {{ $footer->name }}</p>
                            
                            {{ $footer->address }}

                            <div class="col-md-6 map my-10  mx-auto ">
                                {!! $footer->maps !!}
                            </div>

                            <p>{{ $footer->name }} dapat dihubungi melalui : </p>
                            <p>Email : {{ $footer->email }} (Silahkan gunakan PGP untuk komunikasi e-mail terenkripsi, PGP Key dapat diunduh <a href="{{'storage/' .  $key->path }}">disini</a></p>
                            <p>Telephone : {{ $footer->telephone }}</p>
                        @endforeach
                    @endforeach
                </article>

            </div>
        </div>
    </div> 
    <!-- End Contact Section -->
@endsection