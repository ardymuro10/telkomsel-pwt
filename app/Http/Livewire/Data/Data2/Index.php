<?php

namespace App\Http\Livewire\Data\Data2;

use Livewire\Component;
use App\Models\Data2;
use Illuminate\Http\Request;

class Index extends Component
{
    public $search;

    public function render()
    {
        return view('data.data2.index', [
            'data2s' => $this->search === null ?
                Data2::latest()->get() :
                Data2::latest()->where('id','like', '%' . $this->search . '%')->get(),
            // 'data2s' => Data2::latest()->get(),
        ])
        ->layoutData([
            'title' => 'Data 2',
        ]);
    }

}
