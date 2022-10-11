<?php

namespace App\Http\Livewire\Data\Data8;

use Livewire\Component;
use App\Models\Data2;

class Index extends Component
{
    public $data8, $mode;

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
        return view('data.data8.index')
        ->layoutData([
            'title' => 'Power & Transport',
        ]);
    }

    protected $rules = [
        'data8.unik' => ['required', 'string', 'max:100'],
        'data8.unik_krdnt' => ['required', 'string', 'max:100'],
        'data8.id_site' => ['required', 'string', 'max:100'],
        'data8.site_name' => ['required', 'string', 'max:100'],
        'data8.pre_surveipot' => ['required', 'string', 'max:100'],
        'data8.pln' => ['required', 'string', 'max:100'],
        'data8.ass_los' => ['required', 'string', 'max:100'],
        'data8.siteid_farend' => ['required', 'string', 'max:100'],
        'data8.configfe' => ['required', 'string', 'max:100'],
        'data8.min_los' => ['required', 'string', 'max:100'],
        'data8.simple_trans' => ['required', 'string', 'max:100'],
    ];

    protected $validationAttributes  = [
        'data8.unik' => 'unik',
        'data8.unik_krdnt' => 'unik koordinat',
        'data8.id_site' => 'id site',
        'data8.site_name' => 'site name',
        'data8.pre_surveipot' => 'pre survey potensi power',
        'data8.pln' => 'pln',
        'data8.ass_los' => 'assesment los',
        'data8.siteid_farend' => 'site id far end',
        'data8.configfe' => 'config fe',
        'data8.min_los' => 'minimal los',
        'data8.simple_trans' => 'simple transport',
    ];

    public function deleteAction(Data2 $data8)
    {
        $this->resetErrorBag();
        $this->data8 = $data8;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-data8']);
    }

    public function deleteRow(Data2 $data8)
    {
        $this->resetErrorBag();
        $data8->delete();
        $this->data8 = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-data8']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data8']);
    }

    public function addRow(Data2 $data8)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data8 = $data8->create($data['data8']);
        $this->reset(['data8', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data8']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(Data2 $data8)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->data8 = $data8->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data8']);
    }

    public function editRow(Data2 $data8)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data8 = $data8->update($data['data8']);
        $this->reset(['data8', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data8']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }
}
