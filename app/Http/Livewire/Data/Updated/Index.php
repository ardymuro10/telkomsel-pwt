<?php

namespace App\Http\Livewire\Data\Updated;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('data.updated.index')
        ->layoutData([
            'title' => 'Update Data',
        ]);
    }
}
