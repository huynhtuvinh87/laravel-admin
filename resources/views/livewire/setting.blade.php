<x-form-section submit="save">
    <x-slot name="form">
        <div x-data="{ logoName: null, logoPreview: null }" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="logo" x-ref="logo"
                x-on:change="
                                photoName = $refs.logo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    logoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.logo.files[0]);
                        " />

            <x-label for="logo" value="Logo" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! logoPreview">
                <img src="{{ $this->setting['logo'] }}" class="object-cover w-40 h-40 rounded-full">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="logoPreview">
                <span class="block w-40 h-40 rounded-full"
                    x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                    logoPreview + '\');'">
                </span>
            </div>

            <x-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.logo.click()">
                {{ __('Select A New Logo') }}
            </x-secondary-button>

            <x-input-error for="logo" class="mt-2" />
        </div>
        <div x-data="{ faviconName: null, faviconPreview: null }" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="favicon" x-ref="favicon"
                x-on:change="
                                photoName = $refs.favicon.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    faviconPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.favicon.files[0]);
                        " />

            <x-label for="favicon" value="Favicon" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! faviconPreview">
                <img src="{{ $this->setting['favicon'] }}" class="object-cover w-10 h-10 rounded-full">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="faviconPreview">
                <span class="block w-10 h-10 rounded-full"
                    x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                    faviconPreview + '\');'">
                </span>
            </div>

            <x-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.favicon.click()">
                {{ __('Select A New Favicon') }}
            </x-secondary-button>

            <x-input-error for="favicon" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <span class="text-gray-700 dark:text-gray-400">
                Site name
            </span>
            <input name="site_name" wire:model="setting.site_name"
                class="block w-full mt-1 text-sm @error('site_name') border-red-600 @enderror dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
            @error('site_name')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-6 sm:col-span-4">
            <span class="text-gray-700 dark:text-gray-400">
                Site url
            </span>
            <input name="site_url" wire:model="setting.site_url"
                class="block w-full mt-1 text-sm @error('site_url') border-red-600 @enderror dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
            @error('site_url')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-6 sm:col-span-4">
            <span class="text-gray-700 dark:text-gray-400">
                Site email
            </span>
            <input name="site_email" wire:model="setting.site_email"
                class="block w-full mt-1 text-sm @error('site_email') border-red-600 @enderror dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
            @error('site_email')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-6 sm:col-span-4">
            <span class="text-gray-700 dark:text-gray-400">
                Google analytics active
            </span>
            <input name="google_analytics_active" wire:model="setting.google_analytics_active"
                class="block w-full mt-1 text-sm @error('google_analytics_active') border-red-600 @enderror dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
            @error('google_analytics_active')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-6 sm:col-span-4">
            <span class="text-gray-700 dark:text-gray-400">
                Google analytics code
            </span>
            <input name="google_analytics_code" wire:model="setting.google_analytics_code"
                class="block w-full mt-1 text-sm @error('google_analytics_code') border-red-600 @enderror dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
            @error('google_analytics_code')
                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="meta_title" value="Meta title" />
            <x-input id="meta_title" type="text" class="block w-full mt-1" wire:model.defer="setting.meta_title" />
            <x-input-error for="meta_title" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="meta_description" value="Meta description" />
            <x-textarea id="meta_description" type="text" class="block w-full mt-1" wire:model.defer="setting.meta_description" />
            <x-input-error for="meta_description" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="facebook_api_key" value="Facebook api key" />
            <x-input id="facebook_api_key" type="text" class="block w-full mt-1" wire:model.defer="setting.facebook_api_key" />
            <x-input-error for="facebook_api_key" class="mt-2" />
        </div>
        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>

            <x-button>
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-slot>
</x-form-section>
