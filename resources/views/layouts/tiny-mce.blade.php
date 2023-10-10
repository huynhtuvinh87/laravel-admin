<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Using TinyMCE with Laravel Livewire</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="/js/libs/tinymce/tinymce.min.js"></script>


    @livewireStyles
</head>

<body class="bg-gray-200" style="font-family: Nunito;">


<div class="max-w-7xl mx-auto px-4 py-4 sm:py-6 lg:py-8 sm:px-6 lg:px-8 ">
    {{ $slot }}
</div>

@livewireScripts
@stack('scripts')
</body>
</html>