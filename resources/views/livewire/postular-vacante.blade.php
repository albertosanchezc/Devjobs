<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <p class="text-center text-2xl font-bold my-4">Postularme a esta vacante</p>

    @if (session()->has('mensaje'))
        <p class="bg-green-100 border-l-4 border-green-600 text-green-600 font-bold p-2 my-3 uppercase text-sm">
            {{ session('mensaje') }}
        </p>
    @else
        <form wire:submit.prevent="postularme" action="" class="w-95 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full"
                    :value="__('Curriculum u Hoja de Vida')" />
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message">
                @enderror
                <x-primary-button class="my-5">
                    {{ __('Postularme') }}
                </x-primary-button>

        </form>
    @endif
</div>
