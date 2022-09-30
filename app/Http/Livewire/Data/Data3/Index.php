<?php

namespace App\Http\Livewire\Data\Data3;

use Livewire\Component;
use App\Models\Data2;

class Index extends Component
{
    public $data3, $mode;

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
        return view('data.data3.index')
        ->layoutData([
            'title' => 'EQP',
        ]);
    }

    protected $rules = [
        'data3.unik' => ['required', 'string', 'max:100'],
        'data3.unik_krdnt' => ['required', 'int'],
        'data3.id_site' => ['required', 'string', 'max:100'],
        'data3.site_name' => ['required', 'string', 'max:100'],
        'data3.lat' => ['required', 'int'],
        'data3.long' => ['required', 'int'],
        'data3.sp_prog_jpp' => ['required', 'string', 'max:100'],
        'data3.objective' => ['required', 'string', 'max:100'],
        'data3.sow' => ['required', 'string', 'max:100'],
        'data3.prog_jpp' => ['required', 'string', 'max:100'],
        'data3.prog_jppsimple' => ['required', 'string', 'max:100'],
    ];

    protected $validationAttributes  = [
        'data3.name' => 'nama',
        'data3.birth_date' => 'tanggal lahir',
        'data3.burial_date' => 'tanggal meninggal',
        'data3.burial_place' => 'tempat pemakaman',
        'data3.unik' => 'unik',
        'data3.unik_krdnt' => 'unik koordinat',
        'data3.id_site' => 'id site',
        'data3.site_name' => 'site name',
        'data3.lat' => 'lat',
        'data3.long' => 'long',
        'data3.sp_prog_jpp' => 'special program jpp',
        'data3.objective' => 'objective',
        'data3.sow' => 'sow',
        'data3.prog_jpp' => 'program jpp 2023',
        'data3.prog_jppsimple' => 'program jpp 2023 simple',
    ];

    public function deleteAction(Data2 $data3)
    {
        $this->resetErrorBag();
        $this->data3 = $data3;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-data3']);
    }

    public function deleteRow(Data2 $data3)
    {
        $this->resetErrorBag();
        $data3->delete();
        $this->data3 = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-data3']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data3']);
    }

    public function addRow(Data2 $data3)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data3 = $data3->create($data['data3']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data3']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(Data2 $data3)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->data3 = $data3->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data3']);
    }

    public function editRow(Data2 $data3)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data3 = $data3->update($data['data3']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data3']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }

}
