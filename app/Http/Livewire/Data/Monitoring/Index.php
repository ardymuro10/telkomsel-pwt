<?php

namespace App\Http\Livewire\Data\Monitoring;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('data.monitoring.index')
        ->layoutData([
            'title' => 'Monitoring',
        ]);
    }
}
