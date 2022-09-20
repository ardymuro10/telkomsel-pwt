<?php

namespace App\Http\Livewire\Data\Data1;

use Livewire\Component;
use App\Models\Data1;

class Index extends Component
{
    public function render()
    {
        return view('data.data1.index')
        ->layoutData([
            'title' => 'Data 1'
        ]);
    }
}
