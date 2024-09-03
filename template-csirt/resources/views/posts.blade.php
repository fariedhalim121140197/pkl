@extends('layouts.main')

@section('container')

<div class="container" style="margin-top:7rem">
    <div class="row mb-3">
        <div class="col-md-10 mx-auto text-center">
                <h1 class="display-5">Posting Terkini</h1>
        </div>
    </div>
    <div class="card flex rounded-lg"></div>

    <div class="container mx-auto my-4">
        <div class="flex flex-col lg:flex-row justify-between items-center">
            <!-- Search Form -->
            <form action="/posts" class="w-full lg:w-1/2 lg:mb-0">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Kata Kunci" aria-label="Kata Kunci" name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Cari</button>
                </div>
            </form>

            <!-- Dropdown Button -->
            <div class="relative inline-block text-left lg:w-1/5 flex justify-end">
                <button id="dropdownButton" type="button" class="inline-flex justify-between w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                    Kategori Berita...
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="dropdownMenu" class="hidden origin-top-right absolute right-0 mt-2 w-full lg:w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                    <ul class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        @if($categories->count())
                            @foreach ($categories as $category)
                                <li><a href="/posts?category={{ $category->slug }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">{{ $category->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if($posts->count())
        <div class="container">
            <div class="card flex rounded-lg">
                @foreach ($posts as $post)
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
            </div>
        </div>
        <br>

    @else
        <p class="text-center fs-4 mb-5">No Post Found</p>
    @endif

    <div class="d-flex justify-content-center mb-5">
        {{ $posts->links() }}
    </div>
        
</div>
@endsection
