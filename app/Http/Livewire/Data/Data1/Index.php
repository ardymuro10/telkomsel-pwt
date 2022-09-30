<?php

namespace App\Http\Livewire\Data\Data1;

use Livewire\Component;
use App\Models\Data2;
use App\Models\Data1;

class Index extends Component
{
    public $search;

    public function render()
    {
        return view('data.data1.index', [
            'data2s' => $this->search === null ?
                Data2::latest()->get() :
                Data2::latest()->where('prog_jpp','like', '%' . $this->search . '%')->get(),
            // 'data2s' => Data2::latest()->get(),
        ])
        ->layoutData([
            'title' => 'Data 1',
        ]);
    }
}
