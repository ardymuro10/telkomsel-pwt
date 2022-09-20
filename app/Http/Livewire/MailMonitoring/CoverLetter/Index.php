<?php

namespace App\Http\Livewire\MailMonitoring\CoverLetter;

use App\Models\CoverLetter;
use Livewire\Component;

class Index extends Component
{
    public $cover_letter, $mode;

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
        'cover_letter.name' => ['required', 'string', 'max:255'],
        'cover_letter.identity_number' => ['required', 'integer', 'digits:16'],
        'cover_letter.gender' => ['required', 'string', 'in:laki-laki,perempuan'],
        'cover_letter.birth_place' => ['required', 'string', 'max:255'],
        'cover_letter.birth_date' => ['required', 'date'],
        'cover_letter.nationality' => ['required', 'string', 'in:WNI,WNA'],
        'cover_letter.religion' => ['required', 'string', 'in:islam,katolik,protestan,hindu,budha,khonghucu,lainnya'],
        'cover_letter.marriage_status' => ['required', 'string', 'in:kawin,belum kawin,cerai'],
        'cover_letter.occupation' => ['required', 'string', 'max:255'],
        'cover_letter.education' => ['required', 'string', 'max:255'],
        'cover_letter.rt' => ['nullable', 'string', 'max:5'],
        'cover_letter.rw' => ['nullable', 'string', 'max:5'],
        'cover_letter.address' => ['required', 'string', 'max:255'],
        'cover_letter.proof_of_self' => ['nullable', 'string', 'max:255'],
        'cover_letter.necessity' => ['required', 'string', 'max:255'],
        'cover_letter.valid_from' => ['required', 'date'],
        'cover_letter.description' => ['required', 'string', 'max:255'],
        'cover_letter.status' => ['string'],
    ];

    protected $validationAttributes  = [
        'cover_letter.name' => 'nama',
        'cover_letter.identity_number' => 'nik',
        'cover_letter.gender' => 'jenis kelamin',
        'cover_letter.birth_place' => 'tempat lahir',
        'cover_letter.birth_date' => 'tanggal lahir',
        'cover_letter.nationality' => 'warga negara',
        'cover_letter.religion' => 'agama',
        'cover_letter.marriage_status' => 'status perkawinan',
        'cover_letter.occupation' => 'pekerjaan',
        'cover_letter.education' => 'pendidikan',
        'cover_letter.rt' => 'rt',
        'cover_letter.rw' => 'rw',
        'cover_letter.address' => 'alamat',
        'cover_letter.proof_of_self' => 'surat bukti diri',
        'cover_letter.necessity' => 'keperluan',
        'cover_letter.valid_from' => 'tanggal berlaku',
        'cover_letter.description' => 'keterangan',
        'cover_letter.status' => 'status',
    ];

    public function mount()
    {
        $this->mode = 'add';
    }

    public function render()
    {
        return view('mail-monitoring.cover-letter.index')
        ->layoutData([
            'title' => 'Surat Pengantar'
        ]);
    }

    public function deleteAction(CoverLetter $cover_letter)
    {
        $this->cover_letter = $cover_letter;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-cover-letter']);
    }

    public function deleteRow(CoverLetter $cover_letter)
    {
        $cover_letter->delete();
        $this->cover_letter = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-cover-letter']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function editAction(CoverLetter $cover_letter)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->cover_letter = $cover_letter->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-cover-letter']);
    }

    public function editRow(CoverLetter $cover_letter)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->cover_letter = $cover_letter->update($data['cover_letter']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-cover-letter']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-cover-letter']);
    }

    public function addRow(CoverLetter $cover_letter)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        // print_r($data['cover_letter']);
        // exit;
        $this->cover_letter = $cover_letter->create($data['cover_letter']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-cover-letter']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function printAction($id)
    {
        // echo "asu";
        // exit;
        CoverLetter::find($id)->update(['status' => 'Sudah Dicetak']);
        return redirect()->route('mail-monitoring.cover-letter.pdf', $id);
    }
}
