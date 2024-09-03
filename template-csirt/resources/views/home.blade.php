@extends('layouts.main')

@section('container')
    <!-- Blog Section -->
    <section id="blog">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-10 mx-auto text-center">
                    <h1 class="display-5">Posting Terkini</h1> <!-- Use display-1 to display-4 for larger text sizes -->
                </div>
            </div>
        
            <div class="container">
                <div class="card flex rounded-lg">
    
                </div>
            </div>
        </div>
    </section>

    <article class="fs-3">
        <section class="pt-10 bg-gray-100">
            <div class="mx-auto px-4" data-sr-id="2">
                @if ($posts->count())
                    @foreach ($posts->take(5) as $post)
                        <div class="mb-3">
                            <div class="post d-flex">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="mr-4 pic object-contain">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                    <p class="text-lg">
                                        <small class="text-muted">
                                            Diposting oleh <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> di <span class="text-dark">{{ date('d F Y', strtotime($post->created_at)) }}</span> dalam <span class="text-dark">{{ $post->category->name }}</span>
                                        </small>
                                    </p>
                                    <p class="text-xl">{{ $post->excerpt }}</p>
                                    <a href="/posts/{{ $post->slug }}" class="btn btn-secondary" style="margin-top: 2%; float: right;">Baca Selanjutnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center fs-4">Tidak ada posting yang ditemukan</p>
                @endif
            </div>
        </section>
    </article>
    <!-- End Blog Section -->
@endsection