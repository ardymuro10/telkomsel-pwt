<?php

namespace App\Http\Livewire\Data\Monitoring;

use Livewire\Component;
use App\Models\Monitoring;

class Index extends Component
{
    public $monitoring, $mode;

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
        return view('data.monitoring.index')
        ->layoutData([
            'title' => 'Monitoring',
        ]);
    }

    protected $rules = [
        'monitoring.site_id' => ['required', 'string', 'max:255'],
        'monitoring.list_program' => ['required', 'string', 'max:255'],
        'monitoring.type_infra' => ['required', 'string', 'in:infra combat,easy pole,black site,repeater'],
        'monitoring.owner_infra' => ['required', 'string', 'max:255'],
        'monitoring.status' => ['required', 'string', 'in:have program,usulan,on progres,not have program,closed'],
        'monitoring.vendor' => ['required', 'string', 'max:255'],
    ];

    protected $validationAttributes  = [
        'monitoring.site_id' => 'site id',
        'monitoring.list_program' => 'list program',
        'monitoring.type_infra' => 'type infra',
        'monitoring.owner_infra' => 'owner infra',
        'monitoring.status' => 'status',
        'monitoring.vendor' => 'vendor',
    ];

    public function deleteAction(Monitoring $monitoring)
    {
        $this->resetErrorBag();
        $this->monitoring = $monitoring;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-monitoring']);
    }

    public function deleteRow(Monitoring $monitoring)
    {
        $this->resetErrorBag();
        $monitoring->delete();
        $this->monitoring = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-monitoring']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-monitoring']);
    }

    public function addRow(Monitoring $monitoring)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->monitoring = $monitoring->create($data['monitoring']);
        $this->reset(['monitoring', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-monitoring']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(Monitoring $monitoring)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->monitoring = $monitoring->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-monitoring']);
    }

    public function editRow(Monitoring $monitoring)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->monitoring = $monitoring->update($data['monitoring']);
        $this->reset(['monitoring', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-monitoring']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }
}
