<?php

namespace App\Http\Livewire\Home;

use App\Models\Data2;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $data2;
    public $upex, $mode;

    public $file;
    //public $user_list;

    public function mount()
    {
        $totalData = DB::select('SELECT count(*) AS Total From (SELECT id FROM data2s) data');
        $this->totalData = $totalData[0] ? $totalData[0]->Total : 0;
    }

    public function render()
    {
        return view('home.index')
        ->layoutData([
            'title' => 'Dashboard'
        ]);
    }

}
