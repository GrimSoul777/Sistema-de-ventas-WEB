<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class updateCliente extends Component
{
    public $cliente; // 1. Declarar la propiedad pública

    /**
     * Create a new component instance.
     */
    public function __construct($cliente = null) // 2. Recibir la variable
    {   
        $this->cliente = $cliente;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.update-cliente');
    }
}
