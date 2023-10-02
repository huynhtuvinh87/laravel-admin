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

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/focus-trap.js') }}" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('js/charts-pie.js') }}" defer></script>
    <script src="{{ asset('js/charts-bars.js') }}" defer></script>

    @livewireStyles
    {{-- <script>
        import Turbolinks from 'turbolinks';
        Turbolinks.start()
    </script> --}}

    <!-- Scripts -->
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script> --}}
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts.menu')
        @include('layouts.mobile-menu')

        <div class="flex flex-col flex-1 w-full">
            @include('layouts.navigation-dropdown')
            <main class="h-full overflow-y-auto">
                {{ $slot }}
            </main>
        </div>


        @stack('modals')
        @livewireScripts
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

        window.addEventListener('showModal', event => {
            this.isModalOpen = true
            this.trapCleanup = focusTrap(document.querySelector("[id='modal123']"))

            console.log(122222222222)
        });
    </script>
</body>

</html>
