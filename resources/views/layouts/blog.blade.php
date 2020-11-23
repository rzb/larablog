<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title')
        </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="antialiased">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 xl:max-w-5xl xl:px-0">
                <header class="flex justify-between items-center py-8">
                    <div>
                        <a aria-label="Larablog" href="{{ route('posts.index') }}">
                            <svg class="h-12 w-48" width="2427pt" height="624pt" viewBox="0 0 163.82 30.69">
                                <defs>
                                    <style>.cls-1{fill:#000;}.cls-2{fill:#ed1c24;}</style>
                                </defs>
                                <title>square1</title>
                                <g id="Layer_2" data-name="Layer 2">
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <path class="cls-1" d="M17.36,2.87,13.67,6.92C11.72,5.78,10.32,5.2,9.47,5.2A2.25,2.25,0,0,0,7.77,6a2.45,2.45,0,0,0-.72,1.77c0,1.36,1.23,2.53,3.7,3.53a25.07,25.07,0,0,1,4.09,2.09,7.41,7.41,0,0,1,2.32,2.59,7.12,7.12,0,0,1,.93,3.59,8.14,8.14,0,0,1-2.86,6.18,9.69,9.69,0,0,1-6.77,2.62c-2.86,0-5.67-1.35-8.46-4l3.91-4.56c1.74,1.8,3.38,2.71,4.9,2.71a3,3,0,0,0,2.07-1,2.79,2.79,0,0,0,1-2q0-2.16-4.55-3.8a14.45,14.45,0,0,1-3.7-1.78,6.18,6.18,0,0,1-1.83-2.41A7.38,7.38,0,0,1,1,8.25a7.88,7.88,0,0,1,2.39-6A8.67,8.67,0,0,1,9.68,0a10.86,10.86,0,0,1,7.68,2.87ZM45.47,24.24l3.4,3.91-4,2.54L41.78,27a18.45,18.45,0,0,1-6.24,1.28,13.28,13.28,0,0,1-10-4.06A14.4,14.4,0,0,1,21.6,13.75a13.81,13.81,0,0,1,3.81-9.48A12.92,12.92,0,0,1,35.5,0a13.4,13.4,0,0,1,9.89,4,13.49,13.49,0,0,1,4,9.93,14.39,14.39,0,0,1-4,10.24Zm-7.58-1.8L35,19l3.9-2.55,2.67,3.16a7.65,7.65,0,0,0,1.63-5.29,9.24,9.24,0,0,0-2.1-6.39A7,7,0,0,0,35.5,5.54,7.13,7.13,0,0,0,30,7.9,8.72,8.72,0,0,0,27.84,14a9.4,9.4,0,0,0,2.05,6.24,6.49,6.49,0,0,0,5.21,2.45,18,18,0,0,0,2.79-.25ZM54.48.37h5.85V17.23A5.38,5.38,0,0,0,61.64,21a4.41,4.41,0,0,0,3.42,1.43A4.93,4.93,0,0,0,68.84,21a5.7,5.7,0,0,0,1.34-4.06V.37H76V18.22A11.3,11.3,0,0,1,74.8,23.1,8.37,8.37,0,0,1,71.05,27a11.83,11.83,0,0,1-5.66,1.35c-3.77,0-6.54-1.05-8.29-3.16a10.26,10.26,0,0,1-2.62-6.64V.37ZM89.8.37h4.59l11.26,27.57h-6l-2.26-5.42H86.87l-2.16,5.42H78.77L89.8.37Zm2.3,9-3.21,8.13h6.53L92.1,9.4Zm17.83-9H119a9.37,9.37,0,0,1,6.54,2.19,7.57,7.57,0,0,1,2.4,5.9,10.17,10.17,0,0,1-1.1,4.4,7.65,7.65,0,0,1-4.06,3.59l7.7,11.49h-6.8l-7.14-10.66h-.67V27.94h-5.94V.37Zm6,4.92v7.18h1.28q4.64,0,4.64-3.8a2.92,2.92,0,0,0-1.21-2.47,5.42,5.42,0,0,0-3.35-.91ZM135.23.37h15.52V5.83h-9.58V22.48h13.6v5.46H135.23V.37Zm17,11.1h-5.38v5.37h5.38V11.47Z"/>
                                        <polygon class="cls-2" points="154.45 0.37 163.82 0.37 163.82 27.94 157.97 27.94 157.97 5.83 153.43 5.83 154.45 0.37 154.45 0.37"/>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="text-base leading-5">
                        @if (Route::has('login'))

                            @auth
                                <a href="{{ route('dashboard.my-posts.index') }}" class="font-medium text-gray-500 hover:text-gray-700">Dashboard →</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endif

                        @endif
                    </div>
                </header>
            </div>
            <div class="max-w-3xl mx-auto px-4 sm:px-6 xl:max-w-5xl xl:px-0">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>