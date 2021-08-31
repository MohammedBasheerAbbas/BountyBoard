<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bounty Board</title>

            <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/custom.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="flex w-3/6 justify-center align-center">

                <div class="p-6 w-full shadow text-center ">
                    <svg style="padding:0 200px;" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 401.73 150.56"><defs><style>.cls-1{font-size:72px;font-family:Elephant-Regular, Elephant;}.cls-1,.cls-2{fill:#5d27e2;}</style></defs><title>bountyboard1</title><text class="cls-1" transform="translate(120.07 67.53)">Bounty </text><text class="cls-1" transform="translate(120.07 128.53)">Board</text><path class="cls-2" d="M145.63,313.21A2.71,2.71,0,0,0,144,312l-20.48-5.14a12.51,12.51,0,0,0,.61-2.33,12.66,12.66,0,0,0,7.3-5.48,11.33,11.33,0,0,0,1.29-9.16c-1.84-6.43-8.92-10.26-15.77-8.54a12.54,12.54,0,0,0-8.95,8.05,14.94,14.94,0,0,0-1.53.3,14,14,0,0,0-8.6,6.19A12.79,12.79,0,0,0,96.19,300l-37.82-9.5a2.89,2.89,0,0,0-2.07.26A2.59,2.59,0,0,0,55,292.33L30.55,377.91a2.42,2.42,0,0,0,.27,1.94A2.71,2.71,0,0,0,32.48,381l17.61,4.42v24A2.65,2.65,0,0,0,52.82,412h88.63a2.65,2.65,0,0,0,2.73-2.56V321.18l1.72-6a2.42,2.42,0,0,0-.27-1.94Zm-27.31-26.89a7.49,7.49,0,0,1,9.08,4.92,6.53,6.53,0,0,1-.74,5.27,7.33,7.33,0,0,1-4.5,3.24,7.81,7.81,0,0,1-5.63-.69,6.8,6.8,0,0,1,1.79-12.74Zm-15.77,12.15a8.56,8.56,0,0,1,4.95-3.71,11.44,11.44,0,0,0,.3,1.4,12.13,12.13,0,0,0,6,7.33A13.45,13.45,0,0,0,118.4,305a8.49,8.49,0,0,1-6.05,5.45,8.79,8.79,0,0,1-10.66-5.77A7.66,7.66,0,0,1,102.56,298.47Zm-43-2.34,36.65,9.2q.07.33.17.65a12.84,12.84,0,0,0,1.92,4l-2.86,2.68a2.45,2.45,0,0,0,0,3.62,2.86,2.86,0,0,0,3.86,0l2.87-2.69a14.87,14.87,0,0,0,7.9,2.26,15,15,0,0,0,3.66-.45,14.32,14.32,0,0,0,6.84-3.92l19.32,4.85-18.47,64.59L107,377.25a2.75,2.75,0,0,0-3.34,1.81l-3.88,13.57L36.54,376.76Zm56.72,88.77L106,390.47l2.17-7.61Zm22.41,22H55.56v-20L101,398.24A2.89,2.89,0,0,0,103,398l21.71-11.75a2.59,2.59,0,0,0,1.27-1.55l12.7-44.41v66.6Z" transform="translate(-30.46 -280.96)"/><path class="cls-2" d="M64.26,329.24l54,13.55a2.91,2.91,0,0,0,.71.09,2.71,2.71,0,0,0,2.64-1.9,2.55,2.55,0,0,0-1.93-3.13l-54-13.55a2.75,2.75,0,0,0-3.34,1.81,2.55,2.55,0,0,0,1.93,3.13Z" transform="translate(-30.46 -280.96)"/><path class="cls-2" d="M61.42,339.17l54,13.55a2.91,2.91,0,0,0,.71.09,2.71,2.71,0,0,0,2.64-1.9,2.55,2.55,0,0,0-1.93-3.13l-54-13.55A2.75,2.75,0,0,0,59.49,336a2.55,2.55,0,0,0,1.93,3.13Z" transform="translate(-30.46 -280.96)"/><path class="cls-2" d="M75.1,348,60,344.16A2.75,2.75,0,0,0,56.65,346a2.55,2.55,0,0,0,1.93,3.13l15.1,3.79a2.91,2.91,0,0,0,.71.09,2.71,2.71,0,0,0,2.64-1.9A2.55,2.55,0,0,0,75.1,348Z" transform="translate(-30.46 -280.96)"/><path class="cls-2" d="M86.26,350.85h0A2.56,2.56,0,1,0,89,353.41a2.65,2.65,0,0,0-2.73-2.56Z" transform="translate(-30.46 -280.96)"/></svg>
                    <h1 class="text-lg font-bold mb-4" > Welcome to the Bounty Board</h1>
                    <a href="/login" class="bg-indigo-700 px-12 py-2 rounded-lg text-indigo-50 mt-6 hover:bg-indigo-500 hover:shadow-md "> Login </a>
                     <h2 class="m-4"> or  <a class="underline text-indigo-600" href="/register">Sign up</a> if you don't have an account </h2>
                </div>
            </div>
           
        </div>
    </body>
</html>
