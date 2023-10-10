<div>

    <div class="mb-6 max-w-2xl px-4 py-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <!-- Modal title -->
        <div>

            <!-- Helper text -->
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Title
                </span>
                <input name="title" wire:model.defer="title"
                    class="block w-full mt-1 text-sm @error('title') border-red-600 @enderror dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                @error('title')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    {{ __('Parent') }}
                </span>
                <select name="parent_id" wire:model.defer="parent_id"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="">Select parent category</option>
                    @foreach ($parents as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                </select>
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    {{ __('Status') }}
                </span>
                <select name="status" wire:model.defer="status"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">

                    <option value="1">Active</option>
                    <option value="0">No Active</option>
                </select>
            </label>

        </div>
        <div class="mt-4 text-right">
            <button type="button" wire:click.prevent="switch(0)"
                class="bg-transparent hover:bg-blue-500 text-blue-700 hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded">
                Cancel
        </button>
            <button type="button" wire:click.prevent="submit()" wire:loading.attr="disabled"
                class="px-3 py-1 bg-blue-500 hover:bg-blue-700 text-white border border-blue-700 rounded">
                <span wire:loading.remove wire.target="save">Save</span>
                <span wire:loading>{{ __('Saving...') }}</span>
            </button>
        </div>


    </div>
</div>
