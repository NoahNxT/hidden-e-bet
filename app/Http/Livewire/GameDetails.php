<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GameDetails extends Component
{
    protected $listeners = ['newCsgoData', 'refreshComponent' => '$refresh'];
    public $dataCsgo;

    /**
     * @throws \JsonException
     */
    public function newCsgoData($data)
    {
        $this->dataCsgo = json_decode($data);
        ray( $this->dataCsgo)->die();
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
