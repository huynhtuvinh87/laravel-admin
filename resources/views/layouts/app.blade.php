<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/focus-trap.js') }}" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}" defer></script>
    <script src="/js/libs/tinymce/tinymce.min.js"></script>

    @livewireStyles
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts.menu')
        <div class="flex flex-col flex-1 w-full">
            @include('layouts.navigation-dropdown')
            <main class="h-full overflow-y-auto">
                {{ $slot }}
            </main>
        </div>


        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </div>
    <script type="text/javascript">
        window.addEventListener('delete-confirmation', event => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                width: 400,
                height: 300,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
            })
        });

        window.addEventListener('error_cookie', event => {
            Toast.fire({
                icon: "error",
                title: "Cookies have expired",
            });
        });
        window.addEventListener('deleted', event => {
            Toast.fire({
                icon: "success",
                title: "Delete successfully",
            });
        });
        window.addEventListener('created', event => {
            Toast.fire({
                icon: "success",
                title: "Created successfully",
            });
        });
        window.addEventListener('updated', event => {
            Toast.fire({
                icon: "success",
                title: "Updated successfully",
            });
        });

        window.livewire.on('loadSelect2Hydrate', () => {
            $('.select2-hashtag').select2({
                tags: true,
                ajax: {
                    url: "/ajax/hashtags",
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    }
                }
            }).on('change', function(e) {
                let array_ids = Array.from(e.target.options).filter(option => option.selected).map(option =>
                    option.value);
                Livewire.emit('selectedHashtags', array_ids);
            });
        });
        window.livewire.on('loadSelect2NicheHydrate', () => {
            $('.select2-niche').select2({
                tags: true,
                ajax: {
                    url: "/ajax/niches",
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    }
                }
            }).on('change', function(e) {
                let array_ids = Array.from(e.target.options).filter(option => option.selected).map(option =>
                    option.value);
                Livewire.emit('selectedNiches', array_ids);
            });
        });

        window.addEventListener('load-tinymce', event => {
            tinymce.init({
                selector: '#content',
                height: '610',
                plugins: 'quickbars advlist link image lists',
                //toolbar:'advlist link image lists'
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | lists | indent outdent | image',
                quickbars_insert_toolbar: false
            });
        });
    </script>
</body>

</html>
