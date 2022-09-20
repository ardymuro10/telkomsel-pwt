<?php

namespace App\Http\Livewire\MailMonitoring\MailPoor;

use Livewire\Component;
use App\Models\MailPoor;

class Index extends Component
{
    public $mail_poor, $mode;

    protected $listeners = [
        'deleteAction',
        'editAction',
        'printAction',
    ];

    public $form_mode = [
        'add' => [
            'action' => 'addRow',
            'text' => 'Tambah'
        ],
        'edit' => [
            'action' => 'editRow',
            'text' => 'Edit'
        ]
    ];

    protected $rules = [
        'mail_poor.name' => ['required', 'string', 'max:255'],
        'mail_poor.identity_number' => ['required', 'integer', 'digits:16'],
        'mail_poor.gender' => ['required', 'string', 'in:laki-laki,perempuan'],
        'mail_poor.birth_place' => ['required', 'string', 'max:255'],
        'mail_poor.birth_date' => ['required', 'date'],
        'mail_poor.rt' => ['nullable', 'string', 'max:5'],
        'mail_poor.rw' => ['nullable', 'string', 'max:5'],
        'mail_poor.address' => ['required', 'string', 'max:255'],
        'mail_poor.occupation' => ['required', 'string', 'max:255'],
        'mail_poor.necessity' => ['required', 'string', 'max:255'],
        'mail_poor.status' => ['string'],
    ];

    protected $validationAttributes  = [
        'mail_poor.name' => 'nama',
        'mail_poor.identity_number' => 'nik',
        'mail_poor.gender' => 'jenis kelamin',
        'mail_poor.birth_place' => 'tempat lahir',
        'mail_poor.birth_date' => 'tanggal lahir',
        'mail_poor.rt' => 'rt',
        'mail_poor.rw' => 'rw',
        'mail_poor.address' => 'alamat',
        'mail_poor.occupation' => 'pekerjaan',
        'mail_poor.necessity' => 'keperluan',
        'mail_poor.status' => 'status',
    ];

    public function mount()
    {
        $this->mode = 'add';
    }

    public function render()
    {
        return view('mail-monitoring.mail-poor.index')
        ->layoutData([
            'title' => 'Surat Keterangan Miskin'
        ]);
    }

    public function deleteAction(MailPoor $mail_poor)
    {
        $this->mail_poor = $mail_poor;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-mail-poor']);
    }

    public function deleteRow(MailPoor $mail_poor)
    {
        $mail_poor->delete();
        $this->mail_poor = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-mail-poor']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function editAction(MailPoor $mail_poor)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->mail_poor = $mail_poor->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-mail-poor']);
    }

    public function editRow(MailPoor $mail_poor)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->mail_poor = $mail_poor->update($data['mail_poor']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-mail-poor']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-mail-poor']);
    }

    public function addRow(MailPoor $mail_poor)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->mail_poor = $mail_poor->create($data['mail_poor']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-mail-poor']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function printAction($id)
    {
        MailPoor::find($id)->update(['status' => 'Sudah Dicetak']);
        return redirect()->route('mail-monitoring.mail-poor.pdf', $id);
    }
}
