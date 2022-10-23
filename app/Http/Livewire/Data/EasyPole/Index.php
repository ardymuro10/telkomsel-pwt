<?php

namespace App\Http\Livewire\Data\EasyPole;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('data.easy-pole.index')
        ->layoutData([
            'title' => 'Easy Pole Proposal',
        ]);
    }
}
