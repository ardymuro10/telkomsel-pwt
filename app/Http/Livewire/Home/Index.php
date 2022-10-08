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

        $countOpen = DB::select('SELECT count(*) AS Open FROM (SELECT status FROM monitorings WHERE status = "open") data');
        $this->countOpen = $countOpen[0] ? $countOpen[0]->Open : 0;

        $countOgp = DB::select('SELECT count(*) AS Ogp FROM (SELECT status FROM monitorings WHERE status = "on progres") data');
        $this->countOgp = $countOgp[0] ? $countOgp[0]->Ogp : 0;

        $countClose = DB::select('SELECT count(*) AS Close FROM (SELECT status FROM monitorings WHERE status = "close") data');
        $this->countClose = $countClose[0] ? $countClose[0]->Close : 0;

        $totalDataMonitoring = DB::select('SELECT count(*) AS Total From (SELECT id FROM monitorings) data');
        $this->totalDataMonitoring = $totalDataMonitoring[0] ? $totalDataMonitoring[0]->Total : 0;
    }

    public function render()
    {
        return view('home.index')
        ->layoutData([
            'title' => 'Dashboard'
        ]);
    }

}
