<?php

namespace App\Http\Livewire\Home;

use App\Models\Certificate;
use App\Models\CoverLetter;
use App\Models\DeathPerson;
use App\Models\DifferentData;
use App\Models\BusinessInfo;
use App\Models\MailPoor;
use App\Models\PublicComplaint;
use App\Models\UserList;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $cover_letters;
    public $certificates;
    //public $death_person;
    public $public_complaints;
    public $different_data;
    public $business_info;
    public $mail_poor;
    public $countToday = 0;
    //public $user_list;

    public function mount()
    {
        $this->cover_letters = CoverLetter::latest()->get();
        $this->certificates = Certificate::latest()->get();
        //$this->death_person = DeathPerson::latest()->get();
        $this->public_complaints = PublicComplaint::latest()->get();
        //$this->user_list = UserList::latest()->get();
        $this->different_data = DifferentData::latest()->get();
        $this->business_info = BusinessInfo::latest()->get();
        $this->mail_poor = MailPoor::latest()->get();

        $countToday = DB::select('SELECT count(*) as total FROM (
            SELECT created_at FROM cover_letters WHERE date(created_at)=CURDATE()
            UNION ALL
            SELECT created_at FROM certificates WHERE date(created_at)=CURDATE()
            UNION ALL
            SELECT created_at FROM business_infos WHERE date(created_at)=CURDATE()
            UNION ALL
            SELECT created_at FROM different_data WHERE date(created_at)=CURDATE()
            UNION ALL
            SELECT created_at FROM mail_poors WHERE date(created_at)=CURDATE()
        ) data');
        $this->countToday = $countToday[0] ? $countToday[0]->total : 0;

        $countSudah = DB::select('SELECT count(*) AS Sudah FROM (
            SELECT status FROM certificates WHERE status = "Sudah Dicetak"
            UNION ALL
            SELECT status FROM cover_letters WHERE status = "Sudah Dicetak"
            UNION ALL
            SELECT status FROM business_infos WHERE status = "Sudah Dicetak"
            UNION ALL
            SELECT status FROM different_data WHERE status = "Sudah Dicetak"
            UNION ALL
            SELECT status FROM mail_poors WHERE status = "Sudah Dicetak"
        ) data');
        $this->countSudah = $countSudah[0] ? $countSudah[0]->Sudah : 0;

        $countBelum = DB::select('SELECT count(*) AS Belum FROM (
            SELECT status FROM certificates WHERE status = "Belum Dicetak"
            UNION ALL
            SELECT status FROM cover_letters WHERE status = "Belum Dicetak"
            UNION ALL
            SELECT status FROM business_infos WHERE status = "Belum Dicetak"
            UNION ALL
            SELECT status FROM different_data WHERE status = "Belum Dicetak"
            UNION ALL
            SELECT status FROM mail_poors WHERE status = "Belum Dicetak"
        ) data');
        $this->countBelum = $countBelum[0] ? $countBelum[0]->Belum : 0;

    }

    public function render()
    {
        return view('home.index')
        ->layoutData([
            'title' => 'Dashboard'
        ]);
    }

    public function checkData()
    {
        $cover_letters = CoverLetter::latest()->get();
        $certificates = Certificate::latest()->get();
        // $death_person = DeathPerson::latest()->get();
        $public_complaints = PublicComplaint::latest()->get();
        $different_data = DifferentData::latest()->get();
        $mail_poor = MailPoor::latest()->get();
        $business_info = BusinessInfo::latest()->get();
        //$user_list = UserList::latest()->get();

        // if ($cover_letters->count() > $this->cover_letters->count()) {
        //     $this->dispatchBrowserEvent('show-notification', [
        //         'message' => "Terdapat ".$cover_letters->count()-$this->cover_letters->count()." pengajuan surat pengantar baru !",
        //     ]);
        //     $this->cover_letters = $cover_letters;
        // }
        // if ($certificates->count() > $this->certificates->count()) {
        //     $this->dispatchBrowserEvent('show-notification', [
        //         'message' => "Terdapat ".$certificates->count()-$this->certificates->count()." pengajuan surat keterangan domisili baru !",
        //     ]);
        //     $this->certificates = $certificates;
        // }
        // if ($death_person->count() > $this->death_person->count()) {
        //     $this->dispatchBrowserEvent('show-notification', [
        //         'message' => $death_person->count()-$this->death_person->count()." orang meninggal tercatat !",
        //     ]);
        //     $this->death_person = $death_person;
        // }
        // if ($public_complaints->count() > $this->public_complaints->count()) {
        //     $this->dispatchBrowserEvent('show-notification', [
        //         'message' => "Terdapat ".$public_complaints->count()-$this->public_complaints->count()." pengaduan masyarakat baru !",
        //     ]);
        //     $this->public_complaints = $public_complaints;
        // }
        // if ($different_data->count() > $this->different_data->count()) {
        //     $this->dispatchBrowserEvent('show-notification', [
        //         'message' => "Terdapat ".$different_data->count()-$this->different_data->count()." permohonan beda data !",
        //     ]);
        //     $this->different_data = $different_data;
        // }
        // if ($business_info->count() > $this->business_info->count()) {
        //     $this->dispatchBrowserEvent('show-notification', [
        //         'message' => "Terdapat ".$business_info->count()-$this->business_info->count()." permohonan surat ket usaha !",
        //     ]);
        //     $this->business_info = $business_info;
        // }
        // if ($mail_poor->count() > $this->mail_poor->count()) {
        //     $this->dispatchBrowserEvent('show-notification', [
        //         'message' => "Terdapat ".$mail_poor->count()-$this->mail_poor->count()." permohonan surat miskin !",
        //     ]);
        //     $this->mail_poor = $mail_poor;
        // }
        // if ($user_list->count() > $this->user_list->count()) {
        //     $this->dispatchBrowserEvent('show-notification', [
        //         'message' => "Terdapat ".$user_list->count()-$this->user_list->count()." permohonan daftar pengguna !",
        //     ]);
        //     $this->user_list = $user_list;
        // }
    }
}
