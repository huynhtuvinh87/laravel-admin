<x-form-section submit="save">
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="smtp_host" value="SMTP host" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_host" type="text" class="block w-full mt-1"
                    wire:model.defer="setting.smtp_host" />
                    <x-input-error for="smtp_host" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="smtp_port" value="SMTP port" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_port" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.smtp_port" />
                    <x-input-error for="smtp_port" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="smtp_username" value="SMTP username" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_username" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.smtp_username" />
                    <x-input-error for="smtp_username" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="smtp_password" value="SMTP password" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_password" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.smtp_password" />
                    <x-input-error for="smtp_password" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="smtp_email" value="SMTP email" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_email" type="email" class="block w-full mt-1"
                        wire:model.defer="setting.smtp_email" />
                    <x-input-error for="smtp_email" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="smtp_sender_name" value="SMTP sender name" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_sender_name" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.smtp_sender_name" />
                    <x-input-error for="smtp_sender_name" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="md:flex md:items-center mb-4">
                <div class="md:w-1/3">
                    <x-label for="smtp_encryption" value="SMTP encryption" />
                </div>
                <div class="md:w-2/3">
                    <x-input id="smtp_encryption" type="text" class="block w-full mt-1"
                        wire:model.defer="setting.smtp_encryption" />
                    <x-input-error for="smtp_encryption" class="mt-2" />
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
