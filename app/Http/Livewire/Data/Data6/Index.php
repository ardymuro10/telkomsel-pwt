<?php

namespace App\Http\Livewire\Data\Data6;

use Livewire\Component;
use App\Models\Data2;

class Index extends Component
{
    public $data6, $mode;

    protected $listeners = [
        'deleteAction',
        'editAction'
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

    public function mount()
    {
        $this->mode = 'add';
    }

    public function render()
    {
        return view('data.data6.index')
        ->layoutData([
            'title' => 'Demografi',
        ]);
    }

    protected $rules = [
        'data6.unik' => ['required', 'string', 'max:100'],
        'data6.unik_krdnt' => ['required', 'string', 'max:100'],
        'data6.id_site' => ['required', 'string', 'max:100'],
        'data6.site_name' => ['required', 'string', 'max:100'],
        'data6.branch' => ['required', 'string', 'max:100'],
        'data6.cluster' => ['required', 'string', 'max:100'],
        'data6.do' => ['required', 'string', 'max:100'],
        'data6.id_desa' => ['required', 'string', 'max:100'],
        'data6.nama_desa' => ['required', 'string', 'max:100'],
        'data6.nama_kec' => ['required', 'string', 'max:100'],
        'data6.nama_pul' => ['required', 'string', 'max:100'],
        'data6.nama_kab' => ['required', 'string', 'max:100'],
    ];

    protected $validationAttributes  = [
        'data6.unik' => 'unik',
        'data6.unik_krdnt' => 'unik koordinat',
        'data6.id_site' => 'id site',
        'data6.site_name' => 'site name',
        'data6.branch' => 'branch',
        'data6.cluster' => 'cluster',
        'data6.do' => 'do',
        'data6.id_desa' => 'id desa',
        'data6.nama_desa' => 'nama desa',
        'data6.nama_kec' => 'nama kecamatan',
        'data6.nama_pul' => 'nama pulau',
        'data6.nama_kab' => 'nama kabupaten',
    ];

    public function deleteAction(Data2 $data6)
    {
        $this->resetErrorBag();
        $this->data6 = $data6;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-data6']);
    }

    public function deleteRow(Data2 $data6)
    {
        $this->resetErrorBag();
        $data6->delete();
        $this->data6 = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-data6']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data6']);
    }

    public function addRow(Data2 $data6)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data6 = $data6->create($data['data6']);
        $this->reset(['data6', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data6']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(Data2 $data6)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->data6 = $data6->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data6']);
    }

    public function editRow(Data2 $data6)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data6 = $data6->update($data['data6']);
        $this->reset(['data6', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data6']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }
}
