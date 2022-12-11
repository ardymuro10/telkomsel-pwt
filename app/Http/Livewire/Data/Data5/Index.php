<?php

namespace App\Http\Livewire\Data\Data5;

use Livewire\Component;
use App\Models\Data2;

class Index extends Component
{
    public $data5, $mode;

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
        return view('data.data5.index')
        ->layoutData([
            'title' => 'Review',
        ]);
    }

    protected $rules = [
        'data5.unik' => ['required', 'string', 'max:100'],
        'data5.unik_krdnt' => ['required', 'string', 'max:100'],
        'data5.id_site' => ['required', 'string', 'max:100'],
        'data5.site_name' => ['required', 'string', 'max:100'],
        'data5.isd_totsel' => ['required', 'string', 'max:100'],
        'data5.isd_cattotsel' => ['required', 'string', 'max:100'],
        'data5.site_terdekat' => ['required', 'string', 'max:100'],
        'data5.isd_totp' => ['required', 'string', 'max:100'],
        'data5.isd_cattotp' => ['required', 'string', 'max:100'],
        'data5.tp_id' => ['required', 'string', 'max:100'],
        'data5.tp_name' => ['required', 'string', 'max:100'],
        'data5.tower_hgview' => ['required', 'int'],
        'data5.isd_tocomp' => ['required', 'string', 'max:100'],
        'data5.isd_cattocomp' => ['required', 'string', 'max:100'],
        'data5.kompet' => ['required', 'string', 'max:100'],
        'data5.isd_usuljpp' => ['required', 'string', 'max:100'],
        'data5.isd_cat' => ['required', 'string', 'max:100'],
        'data5.sitename_rev' => ['required', 'string', 'max:100'],
        'data5.luas_hh' => ['required', 'string', 'max:100'],
        'data5.mrbad' => ['required', 'int'],
        'data5.mrgood' => ['required', 'int'],
        'data5.total' => ['required', 'string', 'max:100'],
        'data5.per_badmr' => ['required', 'string', 'max:100'],
        'data5.mr_4gcov' => ['required', 'string', 'max:100'],
    ];

    protected $validationAttributes  = [
        'data5.unik' => 'unik',
        'data5.unik_krdnt' => 'unik koordinat',
        'data5.id_site' => 'id site',
        'data5.site_name' => 'site name',
        'data5.isd_totsel' => 'isd to tsel',
        'data5.isd_cattotsel' => 'isd cat to tsel',
        'data5.site_terdekat' => 'site terdekat',
        'data5.isd_totp' => 'isd to tp',
        'data5.isd_cattotp' => 'is cat to tp',
        'data5.tp_id' => 'tp id',
        'data5.tp_name' => 'tp name',
        'data5.tower_hgview' => 'tower height',
        'data5.isd_tocomp' => 'isd to competitor',
        'data5.isd_cattocomp' => 'isd cat to competitor',
        'data5.kompet' => 'kompetitor',
        'data5.isd_usuljpp' => 'isd usul jpp',
        'data5.isd_cat' => 'isd cat',
        'data5.sitename_rev' => 'site name',
        'data5.luas_hh' => 'luas household',
        'data5.mrbad' => 'mr bad',
        'data5.mrgood' => 'mr good',
        'data5.total' => 'total',
        'data5.per_badmr' => 'percentage bad mr',
        'data5.mr_4gcov' => 'mr 4g coverage',
    ];

    public function deleteAction(Data2 $data5)
    {
        $this->resetErrorBag();
        $this->data5 = $data5;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-data5']);
    }

    public function deleteRow(Data2 $data5)
    {
        $this->resetErrorBag();
        $data5->delete();
        $this->data5 = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-data5']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data5']);
    }

    public function addRow(Data2 $data5)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data5 = $data5->create($data['data5']);
        $this->reset(['data5', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data5']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(Data2 $data5)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->data5 = $data5->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data5']);
    }

    public function editRow(Data2 $data5)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data5 = $data5->update($data['data5']);
        $this->reset(['data5', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data5']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }
}
