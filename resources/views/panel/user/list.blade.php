<x-app-layout title="Users">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Users
        </h2>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            @livewire('user.lists')

        </div>
    </div>
</x-app-layout>