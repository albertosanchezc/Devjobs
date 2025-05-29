<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Es necesario confirmar tu cuenta, revisa tu email y presiona sobre el enlace de confirmación.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('Hemos enviado un nuevo email de confirmación a la cuenta que registraste.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Enviar Email De Confirmación') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-gray-600  hover:text-gray-900 ">
                {{ __('Cerrar Sesión') }}
            </button>
        </form>
    </div>
</x-guest-layout>
