<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];


    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {

        $this->validate();

        // Almacenar CV en el disco duro
        $cv = $this->cv->store('cv', 'public');
        $datos['cv'] = str_replace('cv/', '', $cv);

        /*Forma usada en el curso 
        // $cv = $this->cv->store('public/vacantes'); 
        // $datos['cv'] = str_replace('public/vacantes/', '', $cv);
        */
        // Crear el candidato a la vacante
        $this->vacante->candidatos()->create([ // Hacemos uso de la relación creada
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);

        // Crear notificación y enviar el email

        // Mostrar al usuario un mensaje de ok
        session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte');

        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
