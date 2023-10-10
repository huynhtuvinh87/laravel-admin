<div>
    <div class="grid grid-flow-col gap-3">
        <div class="col-span-1">
            @include('livewire.category.form')
        </div>
        <div class="col-span-3">
            @include('livewire.category.list', ['categories' => $categories])
        </div>

    </div>
</div>
