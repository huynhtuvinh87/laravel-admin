<div>

    <div class="grid grid-flow-col gap-3">
        <div class="col-span-3">
            <div class="mb-6  px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div>
                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="title" value="Title" />
                        <x-input id="title" type="text" class="block w-full mt-1" wire:model.defer="title"
                            autocomplete="title" />
                        <x-input-error for="title" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4 mt-4">
                        <x-label for="description" value="Description" />
                        <x-input.textarea id="description" class="block w-full mt-1" wire:model.defer="description" />

                    </div>
                    <div class="col-span-6 sm:col-span-4 mt-4">
                        <x-label for="content" value="Content" />
                        <x-input.tinymce wire:model="content" placeholder="Type anything you want..." />

                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            <div class="mb-6  px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <x-input.photo />
                <label class="block mt-4">
                    <x-label for="status" value="Status" />
                    <select name="status" wire:model.defer="status"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">

                        <option value="1">Active</option>
                        <option value="0">No Active</option>
                    </select>
                </label>
                <div class="mt-4 text-right">
                    <button type="button" wire:click.prevent="save()" wire:loading.attr="disabled"
                        class="px-3 py-1 bg-blue-500 hover:bg-blue-700 text-white border border-blue-700 rounded">
                        <span wire:loading.remove wire.target="save">Save</span>
                        <span wire:loading>{{ __('Saving...') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
