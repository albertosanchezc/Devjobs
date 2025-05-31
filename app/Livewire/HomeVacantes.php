<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{

    public $termino;
    public $categoria;
    public $salario;
    protected $listeners = ['terminosBusqueda' => 'buscar']; // Escucha por el evento terminosBusqueda y ejecuta buscar de este componente
    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
        
    }

    public function render()
    {
        // $vacantes = Vacante::all();
        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
        })->paginate(20);

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
