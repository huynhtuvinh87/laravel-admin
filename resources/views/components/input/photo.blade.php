<div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
    <!-- Profile Photo File Input -->
    <input type="file" class="hidden" wire:model="photo" x-ref="photo"
        x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                " />

    <x-label for="photo" value="Photo" />
    <!-- Current Profile Photo -->
    <div class="mt-2" x-show="! photoPreview">
        <img src="{{ $this->photo }}" 
            class="object-cover w-60 h-60">
    </div>

    <!-- New Profile Photo Preview -->
    <div class="mt-2" x-show="photoPreview">
        <span class="block w-60 h-60"
            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
            photoPreview + '\');'">
        </span>
    </div>

    <x-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.photo.click()">
        {{ __('Select A New Photo') }}
    </x-secondary-button>

    <x-input-error for="photo" class="mt-2" />
</div>