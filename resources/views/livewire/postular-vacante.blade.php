<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <p class="text-center text-2xl font-bold my-4">Postularme a esta vacante</p>

    <form action="" class="w-95 mt-5">
        <div class="mb-4">
            <x-label for="cv" :value="__('Curriculum u Hoja de Vida')" />
            <x-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full" :value="__('Curriculum u Hoja de Vida')" />


        </div>
    </form>
</div>
