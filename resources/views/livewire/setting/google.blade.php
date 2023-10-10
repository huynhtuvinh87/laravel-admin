<x-form-section submit="save">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="google_active" value="Google active" />
                </div>
                <div class="md:w-2/3">
                    <input id="google_active" wire:model.defer="setting.google_active"
                        class="mr-2 leading-tight" type="checkbox">
                    <x-input-error for="google_active" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="google_api_key" value="Google api key" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="google_api_key" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.google_api_key" />
                    <x-input-error for="google_api_key" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="google_api_secret" value="Google api secret" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="google_api_secret" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.google_api_secret" />
                    <x-input-error for="google_api_secret" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="google_redirect_url" value="Google redirect url" />
                </div>
                <div class="md:w-2/3">
                    <x-textarea id="google_redirect_url" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.google_redirect_url" />
                    <x-input-error for="google_redirect_url" class="mt-2" />
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
