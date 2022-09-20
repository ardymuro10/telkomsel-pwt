<?php

namespace App\Http\Livewire\MailMonitoring\DifferentData;

use Livewire\Component;
use App\Models\DifferentData;

class Index extends Component
{
    public $different_data, $mode;

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
        'different_data.name' => ['required', 'string', 'max:255'],
        'different_data.identity_number' => ['required', 'integer', 'digits:16'],
        'different_data.gender' => ['required', 'string', 'in:laki-laki,perempuan'],
        'different_data.birth_place' => ['required', 'string', 'max:255'],
        'different_data.birth_date' => ['required', 'date'],
        'different_data.rt' => ['nullable', 'string', 'max:5'],
        'different_data.rw' => ['nullable', 'string', 'max:5'],
        'different_data.address' => ['required', 'string', 'max:255'],
        'different_data.document' => ['required', 'string', 'max:255'],
        'different_data.number' => ['required', 'integer', 'digits_between:1,20'],
        'different_data.status' => ['string'],
    ];

    protected $validationAttributes  = [
        'different_data.name' => 'nama',
        'different_data.identity_number' => 'nik',
        'different_data.gender' => 'jenis kelamin',
        'different_data.birth_place' => 'tempat lahir',
        'different_data.birth_date' => 'tanggal lahir',
        'different_data.rt' => 'rt',
        'different_data.rw' => 'rw',
        'different_data.address' => 'alamat',
        'different_data.document' => 'dokumen',
        'different_data.number' => 'nomor',
        'different_data.status' => 'status',
    ];

    public function mount()
    {
        $this->mode = 'add';
    }

    public function render()
    {
        return view('mail-monitoring.different-data.index')
        ->layoutData([
            'title' => 'Surat Beda Data'
        ]);
    }

    public function deleteAction(DifferentData $different_data)
    {
        $this->different_data = $different_data;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-different-data']);
    }

    public function deleteRow(DifferentData $different_data)
    {
        $different_data->delete();
        $this->different_data = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-different-data']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function editAction(DifferentData $different_data)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->different_data = $different_data->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-different-data']);
    }

    public function editRow(DifferentData $different_data)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->different_data = $different_data->update($data['different_data']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-different-data']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-different-data']);
    }

    public function addRow(DifferentData $different_data)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->different_data = $different_data->create($data['different_data']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-different-data']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function printAction($id)
    {
        DifferentData::find($id)->update(['status' => 'Sudah Dicetak']);
        return redirect()->route('mail-monitoring.different-data.pdf', $id);
    }
}
