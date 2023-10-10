<x-form-section submit="save">
    <x-slot name="form">
        <div x-data="{ logoName: null, logoPreview: null }" class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="logo" value="Logo" />
                </div>
                <!-- Profile Photo File Input -->
                <div class="md:w-2/3">
                    <input type="file" class="hidden" wire:model="logo" x-ref="logo"
                        x-on:change="
                                photoName = $refs.logo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    logoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.logo.files[0]);
                        " />



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
            </div>
        </div>
        <div x-data="{ faviconName: null, faviconPreview: null }" class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="favicon" value="Favicon" />
                </div>
                <!-- Profile Photo File Input -->
                <div class="md:w-2/3">
                    <input type="file" class="hidden" wire:model="favicon" x-ref="favicon"
                        x-on:change="
                                photoName = $refs.favicon.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    faviconPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.favicon.files[0]);
                        " />



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
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="site_name" value="Site name" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="site_name" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.site_name" />
                    <x-input-error for="site_name" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="site_url" value="Site url" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="site_url" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.site_url" />
                    <x-input-error for="site_url" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="site_email" value="Site email" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="site_email" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.site_email" />
                    <x-input-error for="site_email" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="google_analytics_active" value="Google analytics active" />
                </div>
                <div class="md:w-2/3">
                    <input id="google_analytics_active" wire:model.defer="setting.google_analytics_active"
                        class="mr-2 leading-tight" type="checkbox">
                    <x-input-error for="google_analytics_active" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="google_analytics_code" value="Google analytics code" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="google_analytics_code" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.google_analytics_code" />
                    <x-input-error for="google_analytics_code" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="meta_title" value="Meta title" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="meta_title" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.meta_title" />
                    <x-input-error for="meta_title" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="meta_description" value="Meta description" />
                </div>
                <div class="md:w-2/3">
                    <x-textarea id="meta_description" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.meta_description" />
                    <x-input-error for="meta_description" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <x-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-action-message>

                    <x-button>
                        {{ __('Save') }}
                    </x-button>
                </div>
            </div>
        </div>
    </x-slot>
</x-form-section>
