<?php

namespace App\Http\Livewire\MailMonitoring\BusinessInfo;

use Livewire\Component;
use App\Models\BusinessInfo;

class Index extends Component
{
    public $business_info, $mode;

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
        'business_info.name' => ['required', 'string', 'max:255'],
        'business_info.identity_number' => ['required', 'integer', 'digits:16'],
        'business_info.birth_place' => ['required', 'string', 'max:255'],
        'business_info.birth_date' => ['required', 'date'],
        'business_info.marriage_status' => ['required', 'string', 'in:kawin,belum kawin,cerai'],
        'business_info.rt' => ['nullable', 'string', 'max:5'],
        'business_info.rw' => ['nullable', 'string', 'max:5'],
        'business_info.address' => ['required', 'string', 'max:255'],
        'business_info.jenisusaha' => ['required', 'string', 'max:255'],
        'business_info.jenisbarang' => ['required', 'string', 'max:255'],
        'business_info.mulaiusaha' => ['required', 'integer', 'digits:4'],
        'business_info.lokasiusaha' => ['required', 'string', 'max:255'],
        'business_info.status' => ['string'],
    ];

    protected $validationAttributes  = [
        'business_info.name' => 'nama',
        'business_info.identity_number' => 'nik',
        'business_info.birth_place' => 'tempat lahir',
        'business_info.birth_date' => 'tanggal lahir',
        'business_info.marriage_status' => 'status perkawinan',
        'business_info.rt' => 'rt',
        'business_info.rw' => 'rw',
        'business_info.address' => 'alamat',
        'business_info.jenisusaha' => 'jenis usaha',
        'business_info.jenisbarang' => 'jenis barang',
        'business_info.mulaiusaha' => 'mulai usaha tahun',
        'business_info.lokasiusaha' => 'lokasi usaha',
        'business_info.status' => 'status',
    ];

    public function mount()
    {
        $this->mode = 'add';
    }

    public function render()
    {
        return view('mail-monitoring.business-info.index')
        ->layoutData([
            'title' => 'Surat Keterangan Usaha'
        ]);
    }

    public function deleteAction(BusinessInfo $business_info)
    {
        $this->business_info = $business_info;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-business-info']);
    }

    public function deleteRow(BusinessInfo $business_info)
    {
        $business_info->delete();
        $this->business_info = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-business-info']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function editAction(BusinessInfo $business_info)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->business_info = $business_info->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-business-info']);
    }

    public function editRow(BusinessInfo $business_info)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->business_info = $business_info->update($data['business_info']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-business-info']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-business-info']);
    }

    public function addRow(BusinessInfo $business_info)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->business_info = $business_info->create($data['business_info']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-business-info']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function printAction($id)
    {
        BusinessInfo::find($id)->update(['status' => 'Sudah Dicetak']);
        return redirect()->route('mail-monitoring.business-info.pdf', $id);
    }
}
