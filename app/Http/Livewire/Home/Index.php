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
        $totalDataMonitoring = DB::select('SELECT count(*) AS Total From (SELECT id FROM monitorings) data');
        $this->totalDataMonitoring = $totalDataMonitoring[0] ? $totalDataMonitoring[0]->Total : 0;

        $totalData = DB::select('SELECT count(*) AS Total From (SELECT id FROM data2s) data');
        $this->totalData = $totalData[0] ? $totalData[0]->Total : 0;

        $countOpen = DB::select('SELECT count(*) AS Open FROM (SELECT status FROM monitorings WHERE status = "open") data');
        $this->countOpen = $countOpen[0] ? $countOpen[0]->Open : 0;

        $countOgp = DB::select('SELECT count(*) AS Ogp FROM (SELECT status FROM monitorings WHERE status = "on progres") data');
        $this->countOgp = $countOgp[0] ? $countOgp[0]->Ogp : 0;

        $countClose = DB::select('SELECT count(*) AS Close FROM (SELECT status FROM monitorings WHERE status = "close") data');
        $this->countClose = $countClose[0] ? $countClose[0]->Close : 0;

        $countEasyOpen = DB::select('SELECT count(*) AS Easyopen FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "easy pole"
        AND status = "open")) data');
        $this->countEasyOpen = $countEasyOpen[0] ? $countEasyOpen[0]->Easyopen : 0;

        $countEasyOgp = DB::select('SELECT count(*) AS Easyogp FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "easy pole"
        AND status = "on progres")) data');
        $this->countEasyOgp = $countEasyOgp[0] ? $countEasyOgp[0]->Easyogp : 0;

        $countEasyclose = DB::select('SELECT count(*) AS Easyclose FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "easy pole"
        AND status = "close")) data');
        $this->countEasyclose = $countEasyclose[0] ? $countEasyclose[0]->Easyclose : 0;

        $countBlackopen = DB::select('SELECT count(*) AS Blackopen FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "black site"
        AND status = "open")) data');
        $this->countBlackopen = $countBlackopen[0] ? $countBlackopen[0]->Blackopen : 0;

        $countBlackogp = DB::select('SELECT count(*) AS Blackogp FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "black site"
        AND status = "on progres")) data');
        $this->countBlackogp = $countBlackogp[0] ? $countBlackogp[0]->Blackogp : 0;

        $countBlackclose = DB::select('SELECT count(*) AS Blackclose FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "black site"
        AND status = "close")) data');
        $this->countBlackclose = $countBlackclose[0] ? $countBlackclose[0]->Blackclose : 0;

        $countRepeatopen = DB::select('SELECT count(*) AS Repeatopen FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "repeater"
        AND status = "open")) data');
        $this->countRepeatopen = $countRepeatopen[0] ? $countRepeatopen[0]->Repeatopen : 0;

        $countRepeatogp = DB::select('SELECT count(*) AS Repeatogp FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "repeater"
        AND status = "on progres")) data');
        $this->countRepeatogp = $countRepeatogp[0] ? $countRepeatogp[0]->Repeatogp : 0;

        $countRepeatclose = DB::select('SELECT count(*) AS Repeatclose FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "repeater"
        AND status = "close")) data');
        $this->countRepeatclose = $countRepeatclose[0] ? $countRepeatclose[0]->Repeatclose : 0;

    }

    public function render()
    {
        return view('home.index')
        ->layoutData([
            'title' => 'Dashboard'
        ]);
    }

}
