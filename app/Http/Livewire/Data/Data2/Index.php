<?php

namespace App\Http\Livewire\Data\Data2;

use Livewire\Component;
use App\Models\Data2;

class Index extends Component
{
    public function render()
    {
        return view('data.data2.index')
        ->layoutData([
            'title' => 'Data 2'
        ]);
    }
}
