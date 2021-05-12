<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GameDetails extends Component
{
    protected $listeners = ['newCsgoData', 'refreshComponent' => '$refresh'];


    public function newCsgoData($data)
    {
        ray($data);
        $this->emit('refreshComponent');
        ray('refreshed');
    }

/*    public function Listeners(): array
    {
        return ['newCsgoData' => 'updateData'];
    }*/

    public function render()
    {

        return view('livewire.game-details');
    }
}
