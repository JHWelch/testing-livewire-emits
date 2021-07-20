<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EmitTest extends Component
{
    public $variable = 'x';

    protected $listeners = [
        'emitted-event' => 'changeVariable',
    ];

    public function emitEvent()
    {
        $this->emit('emitted-event');
    }

    public function changeVariable()
    {
        $this->variable = 'successfully emitted';
    }
}
