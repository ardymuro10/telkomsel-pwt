<?php

namespace App\Http\Livewire\Data\Data10;

use Livewire\Component;
use App\Models\Data2;

class Index extends Component
{
    public $data10, $mode;

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
        return view('data.data10.index')
        ->layoutData([
            'title' => 'KOM/KKST & Report',
        ]);
    }

    protected $rules = [
        'data10.unik' => ['required', 'string', 'max:100'],
        'data10.unik_krdnt' => ['required', 'string', 'max:100'],
        'data10.id_site' => ['required', 'string', 'max:100'],
        'data10.site_name' => ['required', 'string', 'max:100'],
        'data10.no_komkkst' => ['required', 'string', 'max:100'],
        'data10.tp_komkkst' => ['required', 'string', 'max:100'],
        'data10.tgl_kom' => ['required', 'date'],
        'data10.cp_eqp' => ['required', 'string', 'max:100'],
        'data10.pre_sales' => ['required', 'string', 'max:100'],
        'data10.aging' => ['required', 'string', 'max:100'],
        'data10.batch_final' => ['required', 'string', 'max:100'],
        'data10.prog_sim' => ['required', 'string', 'max:100'],
        'data10.need_supp' => ['required', 'string', 'max:100'],
        'data10.detail_prog' => ['required', 'string', 'max:100'],
        'data10.need_form' => ['required', 'string', 'max:100'],
        'data10.remark_rep' => ['required', 'string', 'max:100'],
    ];

    protected $validationAttributes  = [
        'data10.unik' => 'unik',
        'data10.unik_krdnt' => 'unik koordinat',
        'data10.id_site' => 'id site',
        'data10.site_name' => 'site name',
        'data10.no_komkkst' => 'no kom/kkst',
        'data10.tp_komkkst' => 'tp',
        'data10.tgl_kom' => 'tanggal kom',
        'data10.cp_eqp' => 'cp eqp',
        'data10.pre_sales' => 'pre sales',
        'data10.aging' => 'aging',
        'data10.batch_final' => 'batch final',
        'data10.prog_sim' => 'progres simple',
        'data10.need_supp' => 'need support ke management',
        'data10.detail_prog' => 'detail progres',
        'data10.need_form' => 'need form survey',
        'data10.remark_rep' => 'remark',
    ];

    public function deleteAction(Data2 $data10)
    {
        $this->resetErrorBag();
        $this->data10 = $data10;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-data10']);
    }

    public function deleteRow(Data2 $data10)
    {
        $this->resetErrorBag();
        $data10->delete();
        $this->data10 = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-data10']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data10']);
    }

    public function addRow(Data2 $data10)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data10 = $data10->create($data['data10']);
        $this->reset(['data10', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data10']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(Data2 $data10)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->data10 = $data10->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data10']);
    }

    public function editRow(Data2 $data10)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data10 = $data10->update($data['data10']);
        $this->reset(['data10', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data10']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }
}
