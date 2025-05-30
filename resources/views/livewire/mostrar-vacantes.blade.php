<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

    @forelse ($vacantes as $vacante)
        <div class="p-6 bg-white text-gray-900 border-b border-gray-200 md:flex md:justify-between items-center">
            <div class="space-y-3">
                <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                <p class="text-sm text-gray-500">Ultimo día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
            </div>

            <div class="flex flex-col md:flex-row items-strech gap-3  mt-5 md:mt-0">

                <a href="#"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Candidatos</a>

                <a href="{{ route('vacantes.edit', $vacante->id) }}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                <button wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }} )"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</button>
            </div>
        </div>

    @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
    @endforelse

    <div class="m-10">
        {{ $vacantes->links() }}
    </div>
</div>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás revertir esto',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if(result.isConfirmed){
                    // Livewire.emit('eliminarVacante') versiones anteriores de livewire
                    @this.call('eliminarVacante', vacanteId);
                    Swal.fire(
                        'Se eliminó la Vacante',
                        'Eliminado Correctamente',
                        'success'
                    )
                }
            });
        })
    </script>
@endpush
