<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WalletCard extends Component
{

    protected $listeners = ['wallet-card' => '$refresh'];



    public function render()
    {
        return view('livewire.wallet-card');
    }
}
