@extends('layouts.blog')

@section('title')
    Larablog
@endsection

@section('content')
    <div class="divide-y divide-gray-200">
        <div class="pt-6 pb-8 space-y-2 md:space-y-5">
            <h1 class="text-3xl leading-9 font-extrabold text-gray-900 tracking-tight sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">Latest</h1>
            <p class="text-lg leading-7 text-gray-500">All the latest blog posts to everyone visiting the web.</p>
        </div>
        <ul class="divide-y divide-gray-200">
            @foreach($posts as $post)
                <li class="py-12">
                    <article class="space-y-2 xl:grid xl:grid-cols-4 xl:space-y-0 xl:items-baseline">
                        <dl>
                            <dt class="sr-only">Published on</dt>
                            <dd class="text-base leading-6 font-medium text-gray-500">
                                <time datetime="{{ $post->publication_date }}">
                                    {{ $post->publication_date->format('M d, Y') }}
                                </time>
                            </dd>
                        </dl>
                        <div class="space-y-5 xl:col-span-3">
                            <div class="space-y-6">
                                <h2 class="text-2xl leading-8 font-bold tracking-tight">
                                    <a class="text-gray-900" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                </h2>
                                <div class="prose max-w-none text-gray-500 truncate">
                                    {!! $post->description !!}
                                </div>
                            </div>
                            <div class="text-base leading-6 font-medium">
                                <a class="text-teal-500 hover:text-teal-600" href="{{ route('posts.show', $post) }}">
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>

        {{ $posts->links() }}
    </div>
@endsection