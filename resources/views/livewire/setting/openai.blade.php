<x-form-section submit="save">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="openai_api_secret_1" value="Openai api secret 1" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_host" type="text" class="block w-full mt-1"
                    wire:model.defer="setting.openai_api_secret_1" />
                    <x-input-error for="openai_api_secret_1" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="openai_api_secret_2" value="Openai api secret 2" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_host" type="text" class="block w-full mt-1"
                    wire:model.defer="setting.openai_api_secret_2" />
                    <x-input-error for="openai_api_secret_2" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="openai_api_secret_3" value="Openai api secret 3" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_host" type="text" class="block w-full mt-1"
                    wire:model.defer="setting.openai_api_secret_3" />
                    <x-input-error for="openai_api_secret_3" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="openai_api_secret_4" value="Openai api secret 4" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_host" type="text" class="block w-full mt-1"
                    wire:model.defer="setting.openai_api_secret_4" />
                    <x-input-error for="openai_api_secret_4" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="openai_api_secret_5" value="Openai api secret 5" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_host" type="text" class="block w-full mt-1"
                    wire:model.defer="setting.openai_api_secret_5" />
                    <x-input-error for="openai_api_secret_5" class="mt-2" />
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
