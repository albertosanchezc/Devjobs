<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model.live="titulo" :value="old('titulo')"
            placeholder="Titulo de la Vacante" />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual (USD)')" />
        <select wire:model.live="salario" id="salario"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:fing-opacity-50 w-full">
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>

        @error('salario')
            {{-- {{ $message }} --}}
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select wire:model.live="categoria" id="categoria"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:fing-opacity-50 w-full">
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>

        @error('categoria')
            {{-- {{ $message }} --}}
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model.live="empresa"
            :value="old('empresa')" placeholder="Empresa: ej, Netflix, Uber, Shopify" />
        @error('empresa')
            {{-- {{ $message }} --}}
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>


    <div>
        <x-input-label for="ultimo_dia" :value="__('Último Día para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model.live="ultimo_dia"
            :value="old('ultimo_dia')" placeholder="Empresa: ej, Netflix, Uber, Shopify" />
        @error('ultimo_dia')
            {{-- {{ $message }} --}}
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>


    <div>
        <x-input-label for="descripcion" :value="__('Descripción del Puesto')" />
        <textarea wire:model.live="descripcion" placeholder="Descripción general del puesto, experiencia"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:fing-opacity-50 w-full h-72"></textarea>

        @error('descripcion')
            {{-- {{ $message }} --}}
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block m-3 w-full" type="file" wire:model.live="imagen" accept="image/*" />

        <div class="my-5 w-80">
            @if($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="Imágen de Publicación">
            @endif
        </div>

        @error('imagen')
            {{-- {{ $message }} --}}
            <livewire:mostrar-alerta :message="$message" />
        @enderror

        <x-primary-button>
            Crear Vacante
        </x-primary-button>

    </div>

</form>
