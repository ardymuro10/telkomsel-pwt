<?php

namespace App\Http\Livewire\Data\Data7;

use Livewire\Component;
use App\Models\Data2;

class Index extends Component
{
    public $data7, $mode;

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
        return view('data.data7.index')
        ->layoutData([
            'title' => 'Sales',
        ]);
    }

    protected $rules = [
        'data7.unik' => ['required', 'string', 'max:100'],
        'data7.unik_krdnt' => ['required', 'string', 'max:100'],
        'data7.id_site' => ['required', 'string', 'max:100'],
        'data7.site_name' => ['required', 'string', 'max:100'],
        'data7.reg_rev_proj' => ['required', 'string', 'max:100'],
        'data7.kom_rev' => ['required', 'string', 'max:100'],
        'data7.rev_cat_pr' => ['required', 'string', 'max:100'],
        'data7.pot_nsbranch' => ['required', 'string', 'max:100'],
        'data7.arpu_kec' => ['required', 'string', 'max:100'],
        'data7.rank_perns' => ['required', 'string', 'max:100'],
        'data7.prior_srm' => ['required', 'int'],
        'data7.rank_reg' => ['required', 'int'],
        'data7.rank_rtpe' => ['required', 'string', 'max:100'],
        'data7.prior_finreg' => ['required', 'string', 'max:100'],
    ];

    protected $validationAttributes  = [
        'data7.unik' => 'unik',
        'data7.unik_krdnt' => 'unik koordinat',
        'data7.id_site' => 'id site',
        'data7.site_name' => 'site name',
        'data7.reg_rev_proj' => 'reg rev projection',
        'data7.kom_rev' => 'komitment revenue (branch)',
        'data7.rev_cat_pr' => 'rev cat (priority)',
        'data7.pot_nsbranch' => 'potensi ns/branch',
        'data7.arpu_kec' => 'arpu kecamatan',
        'data7.rank_perns' => 'rank per ns/branch',
        'data7.prior_srm' => 'priority srm',
        'data7.rank_reg' => 'rank regional',
        'data7.rank_rtpe' => 'rank rtpe',
        'data7.prior_finreg' => 'priority final regional',
    ];

    public function deleteAction(Data2 $data7)
    {
        $this->resetErrorBag();
        $this->data7 = $data7;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-data7']);
    }

    public function deleteRow(Data2 $data7)
    {
        $this->resetErrorBag();
        $data7->delete();
        $this->data7 = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-data7']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data7']);
    }

    public function addRow(Data2 $data7)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data7 = $data7->create($data['data7']);
        $this->reset(['data7', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data7']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(Data2 $data7)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->data7 = $data7->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data7']);
    }

    public function editRow(Data2 $data7)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data7 = $data7->update($data['data7']);
        $this->reset(['data7', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data7']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }
}
