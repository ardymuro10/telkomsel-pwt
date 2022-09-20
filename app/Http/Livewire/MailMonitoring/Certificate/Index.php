<?php

namespace App\Http\Livewire\MailMonitoring\Certificate;

use App\Models\Certificate;
use Livewire\Component;

class Index extends Component
{
    public $certificate, $mode;

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
        'certificate.name' => ['required', 'string', 'max:255'],
        'certificate.identity_number' => ['required', 'integer', 'digits:16'],
        'certificate.birth_place' => ['required', 'string', 'max:255'],
        'certificate.birth_date' => ['required', 'date'],
        'certificate.gender' => ['required', 'string', 'in:laki-laki,perempuan'],
        'certificate.nationality' => ['required', 'string', 'in:WNI,WNA'],
        'certificate.religion' => ['required', 'string', 'in:islam,katolik,protestan,hindu,budha,khonghucu,lainnya'],
        'certificate.rt' => ['nullable', 'string', 'max:5'],
        'certificate.rw' => ['nullable', 'string', 'max:5'],
        'certificate.address' => ['required', 'string', 'max:255'],
        'certificate.status' => ['string'],
    ];

    protected $validationAttributes  = [
        'certificate.name' => 'nama',
        'certificate.identity_number' => 'nik',
        'certificate.birth_place' => 'tempat lahir',
        'certificate.birth_date' => 'tanggal lahir',
        'certificate.gender' => 'jenis kelamin',
        'certificate.nationality' => 'warga negara',
        'certificate.religion' => 'agama',
        'certificate.rt' => 'rt',
        'certificate.rw' => 'rw',
        'certificate.address' => 'alamat',
        'certificate.status' => 'status',
    ];

    public function mount()
    {
        $this->mode = 'add';
    }

    public function render()
    {
        return view('mail-monitoring.certificate.index')
        ->layoutData([
            'title' => 'Surat Keterangan Domisili'
        ]);
    }

    public function deleteAction(Certificate $certificate)
    {
        $this->certificate = $certificate;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-certificate']);
    }

    public function deleteRow(Certificate $certificate)
    {
        $certificate->delete();
        $this->certificate = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-certificate']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function editAction(Certificate $certificate)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->certificate = $certificate->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-certificate']);
    }

    public function editRow(Certificate $certificate)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->certificate = $certificate->update($data['certificate']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-certificate']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-certificate']);
    }

    public function addRow(Certificate $certificate)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->certificate = $certificate->create($data['certificate']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-certificate']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function printAction($id)
    {
        Certificate::find($id)->update(['status' => 'Sudah Dicetak']);
        return redirect()->route('mail-monitoring.certificate.pdf', $id);
    }

}
