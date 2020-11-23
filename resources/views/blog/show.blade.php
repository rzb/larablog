@extends('layouts.blog')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="max-w-3xl mx-auto px-4 sm:px-6 xl:max-w-5xl xl:px-0">
        <main>
            <article class="xl:divide-y xl:divide-gray-200">
                <header class="pt-6 xl:pb-10">
                    <div class="space-y-1 text-center">
                        <dl class="space-y-10">
                            <div>
                                <dt class="sr-only">Published on</dt>
                                <dd class="text-base leading-6 font-medium text-gray-500">
                                    <time datetime="{{ $post->publication_date }}">
                                        {{ $post->publication_date->format('M d, Y') }}
                                    </time>
                                </dd>
                            </div>
                        </dl>
                        <div>
                            <h1 class="text-3xl leading-9 font-extrabold text-gray-900 tracking-tight sm:text-4xl sm:leading-10 md:text-5xl md:leading-14">
                                {{ $post->title }}
                            </h1>
                        </div>
                    </div>
                </header>
                <div class="divide-y xl:divide-y-0 divide-gray-200 xl:grid xl:grid-cols-4 xl:col-gap-6 pb-16 xl:pb-20" style="grid-template-rows: auto 1fr;">
                    <dl class="pt-6 pb-10 xl:pt-11 xl:border-b xl:border-gray-200">
                        <dt class="sr-only">Authors</dt>
                        <dd>
                            <ul class="flex justify-center xl:block space-x-8 sm:space-x-12 xl:space-x-0 xl:space-y-8">
                                <li class="flex items-center space-x-2">
                                    <img src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}" class="h-8 w-8 rounded-full object-cover">
                                    <dl class="text-sm font-medium leading-5 whitespace-no-wrap">
                                        <dt class="sr-only">Name</dt>
                                        <dd class="text-gray-900">{{ $post->author->name }}</dd>
                                    </dl>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <div class="divide-y divide-gray-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
                        <div class="prose max-w-none pt-10 pb-8">
                            {!! $post->description !!}
                        </div>
                    </div>
                    <footer class="text-sm font-medium leading-5 divide-y divide-gray-200 xl:col-start-1 xl:row-start-2">
                        <div class="pt-8">
                            <a class="text-teal-500 hover:text-teal-600" href="{{ route('posts.index') }}">← Back to the blog</a>
                        </div>
                    </footer>
                </div>
            </article>
        </main>
    </div>
@endsection