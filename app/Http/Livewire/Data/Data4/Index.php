<?php

namespace App\Http\Livewire\Data\Data4;

use Livewire\Component;
use App\Models\Data2;

class Index extends Component
{
    public $data4, $mode;

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
        return view('data.data4.index')
        ->layoutData([
            'title' => 'Tower',
        ]);
    }

    protected $rules = [
        'data4.unik' => ['required', 'string', 'max:100'],
        'data4.unik_krdnt' => ['required', 'string', 'max:100'],
        'data4.id_site' => ['required', 'string', 'max:100'],
        'data4.site_name' => ['required', 'string', 'max:100'],
        'data4.sow_infra' => ['required', 'string', 'in:b2s,collo tp'],
        'data4.infra_type' => ['required', 'string', 'max:100'],
        'data4.site_id_tp' => ['required', 'string', 'max:100'],
        'data4.plan_tower_prov' => ['required', 'string', 'max:100'],
        'data4.tower_hg' => ['required', 'int'],
    ];

    protected $validationAttributes  = [
        'data4.unik' => 'unik',
        'data4.unik_krdnt' => 'unik koordinat',
        'data4.id_site' => 'id site',
        'data4.site_name' => 'site name',
        'data4.sow_infra' => 'sow type',
        'data4.infra_type' => 'infra type',
        'data4.site_id_tp' => 'site id tp',
        'data4.plan_tower_prov' => 'plan tower provider',
        'data4.tower_hg' => 'tower height',
    ];

    public function deleteAction(Data2 $data4)
    {
        $this->resetErrorBag();
        $this->data4 = $data4;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-data4']);
    }

    public function deleteRow(Data2 $data4)
    {
        $this->resetErrorBag();
        $data4->delete();
        $this->data4 = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-data4']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data4']);
    }

    public function addRow(Data2 $data4)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data4 = $data4->create($data['data4']);
        $this->reset(['data4', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data4']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(Data2 $data4)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->data4 = $data4->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data4']);
    }

    public function editRow(Data2 $data4)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data4 = $data4->update($data['data4']);
        $this->reset(['data4', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data4']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }
}
