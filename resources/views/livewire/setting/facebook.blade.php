<x-form-section submit="save">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="facebook_active" value="Facebook active" />
                </div>
                <div class="md:w-2/3">
                    <input id="facebook_active" wire:model.defer="setting.facebook_active"
                        class="mr-2 leading-tight" type="checkbox">
                    <x-input-error for="facebook_active" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="facebook_api_key" value="Facebook api key" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="facebook_api_key" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.facebook_api_key" />
                    <x-input-error for="facebook_api_key" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="facebook_api_secret" value="Facebook api secret" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="facebook_api_secret" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.facebook_api_secret" />
                    <x-input-error for="facebook_api_secret" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="facebook_redirect_url" value="Facebook redirect url" />
                </div>
                <div class="md:w-2/3">
                    <x-textarea id="facebook_redirect_url" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.facebook_redirect_url" />
                    <x-input-error for="facebook_redirect_url" class="mt-2" />
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
