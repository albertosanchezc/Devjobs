<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{

    public $termino;
    public $categoria;
    public $salario;

    public function leerDatosFormulario()
    {
        // $this->emit('terminosBusqueda');// Emitimos el evento de terminosBusqueda (versión anterior)
        $this->dispatch('terminosBusqueda',$this->termino, $this->categoria, $this->salario); // Versión para livewire v3
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        
        return view('livewire.filtrar-vacantes',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
