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

        // $countOpen = DB::select('SELECT count(*) AS Open FROM (SELECT status FROM monitorings WHERE status = "open") data');
        // $this->countOpen = $countOpen[0] ? $countOpen[0]->Open : 0;

        // $countOgp = DB::select('SELECT count(*) AS Ogp FROM (SELECT status FROM monitorings WHERE status = "on progres") data');
        // $this->countOgp = $countOgp[0] ? $countOgp[0]->Ogp : 0;

        // $countClose = DB::select('SELECT count(*) AS Close FROM (SELECT status FROM monitorings WHERE status = "close") data');
        // $this->countClose = $countClose[0] ? $countClose[0]->Close : 0;

        // $countEasyOpen = DB::select('SELECT count(*) AS Easyopen FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "easy pole"
        // AND status = "open")) data');
        // $this->countEasyOpen = $countEasyOpen[0] ? $countEasyOpen[0]->Easyopen : 0;

        // $countEasyOgp = DB::select('SELECT count(*) AS Easyogp FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "easy pole"
        // AND status = "on progres")) data');
        // $this->countEasyOgp = $countEasyOgp[0] ? $countEasyOgp[0]->Easyogp : 0;

        // $countEasyclose = DB::select('SELECT count(*) AS Easyclose FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "easy pole"
        // AND status = "close")) data');
        // $this->countEasyclose = $countEasyclose[0] ? $countEasyclose[0]->Easyclose : 0;

        // $countBlackopen = DB::select('SELECT count(*) AS Blackopen FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "black site"
        // AND status = "open")) data');
        // $this->countBlackopen = $countBlackopen[0] ? $countBlackopen[0]->Blackopen : 0;

        // $countBlackogp = DB::select('SELECT count(*) AS Blackogp FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "black site"
        // AND status = "on progres")) data');
        // $this->countBlackogp = $countBlackogp[0] ? $countBlackogp[0]->Blackogp : 0;

        // $countBlackclose = DB::select('SELECT count(*) AS Blackclose FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "black site"
        // AND status = "close")) data');
        // $this->countBlackclose = $countBlackclose[0] ? $countBlackclose[0]->Blackclose : 0;

        // $countRepeatopen = DB::select('SELECT count(*) AS Repeatopen FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "repeater"
        // AND status = "open")) data');
        // $this->countRepeatopen = $countRepeatopen[0] ? $countRepeatopen[0]->Repeatopen : 0;

        // $countRepeatogp = DB::select('SELECT count(*) AS Repeatogp FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "repeater"
        // AND status = "on progres")) data');
        // $this->countRepeatogp = $countRepeatogp[0] ? $countRepeatogp[0]->Repeatogp : 0;

        // $countRepeatclose = DB::select('SELECT count(*) AS Repeatclose FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "repeater"
        // AND status = "close")) data');
        // $this->countRepeatclose = $countRepeatclose[0] ? $countRepeatclose[0]->Repeatclose : 0;

        // $totalEasypole = DB::select('SELECT count(*) AS Totaleasy FROM (SELECT type_infra FROM monitorings WHERE type_infra = "easy pole") data');
        // $this->totalEasypole = $totalEasypole[0] ? $totalEasypole[0]->Totaleasy : 0;

        // $totalBlacksite = DB::select('SELECT count(*) AS Totalblack FROM (SELECT type_infra FROM monitorings WHERE type_infra = "black site") data');
        // $this->totalBlacksite = $totalBlacksite[0] ? $totalBlacksite[0]->Totalblack : 0;

        // $totalRepeater = DB::select('SELECT count(*) AS TotalRepeat FROM (SELECT type_infra FROM monitorings WHERE type_infra = "repeater") data');
        // $this->totalRepeater = $totalRepeater[0] ? $totalRepeater[0]->TotalRepeat : 0;

        // $countCombat = DB::select('SELECT count(*) AS Combat FROM (SELECT type_infra FROM monitorings WHERE type_infra = "infra combat") data');
        // $this->countCombat = $countCombat[0] ? $countCombat[0]->Combat : 0;

        // $countCombathave = DB::select('SELECT count(*) AS Combathave FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "infra combat"
        // AND status = "have program")) data');
        // $this->countCombathave = $countCombathave[0] ? $countCombathave[0]->Combathave : 0;

        // $countEasyhave = DB::select('SELECT count(*) AS Easyhave FROM (SELECT type_infra FROM monitorings WHERE (type_infra = "easy pole"
        // AND status = "have program")) data');
        // $this->countEasyhave = $countEasyhave[0] ? $countEasyhave[0]->Easyhave : 0;

        $countUpgradecap = DB::select('SELECT count(*) AS Upgradecap FROM (SELECT program FROM monitorings WHERE (program = "upgrade capacity")) data');
        $this->countUpgradecap = $countUpgradecap[0] ? $countUpgradecap[0]->Upgradecap : 0;

        $countBTF = DB::select('SELECT count(*) AS BTF FROM (SELECT program FROM monitorings WHERE (program = "BTF")) data');
        $this->countBTF = $countBTF[0] ? $countBTF[0]->BTF : 0;

        $countPermanenisasi = DB::select('SELECT count(*) AS Permanenisasi FROM (SELECT program FROM monitorings WHERE (program = "permanenisasi combat")) data');
        $this->countPermanenisasi = $countPermanenisasi[0] ? $countPermanenisasi[0]->Permanenisasi : 0;

        $countNewinfra = DB::select('SELECT count(*) AS NewInfra FROM (SELECT program FROM monitorings WHERE (program = "new infra")) data');
        $this->countNewinfra = $countNewinfra[0] ? $countNewinfra[0]->NewInfra : 0;
    }

    public function render()
    {
        return view('home.index')
        ->layoutData([
            'title' => 'Dashboard'
        ]);
    }

}
