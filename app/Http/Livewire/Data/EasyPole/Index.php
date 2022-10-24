<?php

namespace App\Http\Livewire\Data\EasyPole;

use App\Exports\EasyExport;
use App\Imports\EasyImport;
use Livewire\Component;
use App\Models\EasyPole;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithFileUploads;
    public $easypole, $mode, $file;

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
        return view('data.easy-pole.index')
        ->layoutData([
            'title' => 'Easy Pole Proposal',
        ]);
    }

    protected $rules = [
        'easypole.area' => ['required', 'string', 'max:100'],
        'easypole.region' => ['required', 'string', 'max:100'],
        'easypole.site_id' => ['required', 'string', 'max:100'],
        'easypole.site_name' => ['required', 'string', 'max:100'],
        'easypole.lat' => ['required', 'string', 'max:100'],
        'easypole.long' => ['required', 'string', 'max:100'],
        'easypole.site_id_pole' => ['required', 'string', 'max:100'],
        'easypole.site_name_pole' => ['required', 'string', 'max:100'],
        'easypole.lat_pole' => ['required', 'string', 'max:100'],
        'easypole.long_pole' => ['required', 'string', 'max:100'],
        'easypole.type_easypole' => ['required', 'string', 'max:100'],
        'easypole.propose_mitra_pole' => ['required', 'string', 'max:100'],
        'easypole.propose_mitra_fo' => ['required', 'string', 'max:100'],
        'easypole.komit_revreg' => ['required', 'string', 'max:100'],
        'easypole.avg_revsur' => ['required', 'string', 'max:100'],
        'easypole.rev_shifa' => ['required', 'string', 'max:100'],
        'easypole.dis_poletobbu' => ['required', 'string', 'max:100'],
        'easypole.dis_poletosite' => ['required', 'string', 'max:100'],
        'easypole.front_hauldis' => ['required', 'string', 'max:100'],
        'easypole.objective' => ['required', 'string', 'max:100'],
        'easypole.priority' => ['required', 'string', 'max:100'],
    ];

    protected $validationAttributes  = [
        'easypole.area' => 'area',
        'easypole.region' => 'region',
        'easypole.site_id' => 'site id',
        'easypole.site_name' => 'site name',
        'easypole.lat' => 'lat',
        'easypole.long' => 'long',
        'easypole.site_id_pole' => 'site id pole',
        'easypole.site_name_pole' => 'site name pole',
        'easypole.lat_pole' => 'lat pole',
        'easypole.long_pole' => 'long pole',
        'easypole.type_easypole' => 'type easy pole',
        'easypole.propose_mitra_pole' => 'propose mitra pole',
        'easypole.propose_mitra_fo' => 'propose mitra fo',
        'easypole.komit_revreg' => 'komitment revenue regional',
        'easypole.avg_revsur' => 'avg revenue surrounding',
        'easypole.rev_shifa' => 'revenue shifa',
        'easypole.dis_poletobbu' => 'distance pole to bbu',
        'easypole.dis_poletosite' => 'distance pole to site terdekat',
        'easypole.front_hauldis' => 'front haul distance',
        'easypole.objective' => 'objective',
        'easypole.priority' => 'priority',

    ];

    public function deleteAction(EasyPole $easypole)
    {
        $this->resetErrorBag();
        $this->easypole = $easypole;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-easypole']);
    }

    public function deleteRow(EasyPole $easypole)
    {
        $this->resetErrorBag();
        $easypole->delete();
        $this->easypole = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-easypole']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-easypole']);
    }

    public function addRow(EasyPole $easypole)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->easypole = $easypole->create($data['easypole']);
        $this->reset(['easypole', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-easypole']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(EasyPole $easypole)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->easypole = $easypole->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-easypole']);
    }

    public function editRow(EasyPole $easypole)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->easypole = $easypole->update($data['easypole']);
        $this->reset(['easypole', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-easypole']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }

    public function viewEasy()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'import-easypole']);
    }

    public function easyImport()
    {
        $this->resetErrorBag();
        $this->validate([
            'file' => 'required|mimes:xlsx, xls'
        ]);
        Excel::import(new EasyImport, $this->file);
        $this->reset(['easypole', 'file']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'import-easypole']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data dari file.');
    }

    public function download()
    {
        return Excel::download(new EasyExport, 'easy-proposal.xlsx');
    }

}
