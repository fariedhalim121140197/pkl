@extends('layouts.main')

@section('container')

    <div class="container" style="margin-top: 8rem">
        <div class="row justify-content-center mb-5">
            <section id="blog">
                <div class="container">
                    <div class="row mb-3">
                        <h1 class="display-5">{{ $post->title }}</h1> 
                        <p>
                            Oleh <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> dalam 
                            <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                        </p>
                    </div>
                    <div class="card flex"></div>
                </div>
            </section>

            <div class="w-100" style="max-width: 400px; margin: auto;">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid w-100"> 
            </div>

            <article class="my-4 fs-6" style="text-align: justify;">
                {!! $post->body !!}
            </article>
        </div>
    </div>
@endsection

