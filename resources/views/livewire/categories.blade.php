<div>
    @if ($form)
    <div class="mb-6">
        <button wire:click="switch(0)"
            class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Lists
        </button>
    </div>
        @include('livewire.category.form')
    @else
        <div class="mb-6">
            <button wire:click="switch(1)"
                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Add New
            </button>
        </div>
        @include('livewire.category.list', ['categories' => $categories])
    @endif

</div>
