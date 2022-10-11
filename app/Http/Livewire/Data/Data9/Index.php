<?php

namespace App\Http\Livewire\Data\Data9;

use Livewire\Component;
use App\Models\Data2;

class Index extends Component
{
    public $data9, $mode;

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
        return view('data.data9.index')
        ->layoutData([
            'title' => 'DRM',
        ]);
    }

    protected $rules = [
        'data9.unik' => ['required', 'string', 'max:100'],
        'data9.unik_krdnt' => ['required', 'string', 'max:100'],
        'data9.id_site' => ['required', 'string', 'max:100'],
        'data9.site_name' => ['required', 'string', 'max:100'],
        'data9.ur_kandidat' => ['required', 'string', 'max:100'],
        'data9.lat_kandidat' => ['required', 'string', 'max:100'],
        'data9.lon_kandidat' => ['required', 'string', 'max:100'],
        'data9.dist_tonom' => ['required', 'string', 'max:100'],
        'data9.sa_potcomm' => ['required', 'string', 'max:100'],
        'data9.prop_rf' => ['required', 'int'], //
        'data9.alamat' => ['required', 'string', 'max:100'],
        'data9.azimuth' => ['required', 'string', 'max:100'],
        'data9.tipe_rf' => ['required', 'string', 'max:100'],
        'data9.tipe_rru' => ['required', 'string', 'max:100'],
        'data9.m_tilt' => ['required', 'string', 'max:100'],
        'data9.e_tilt' => ['required', 'string', 'max:100'],
        'data9.jum_sector' => ['required', 'int'], //
        'data9.siteid_fe' => ['required', 'string', 'max:100'],
        'data9.sitename_fe' => ['required', 'string', 'max:100'],
        'data9.lat_fe' => ['required', 'string', 'max:100'],
        'data9.lon_fe' => ['required', 'string', 'max:100'],
        'data9.tp' => ['required', 'string', 'max:100'],
        'data9.tower_hghtfe' => ['required', 'int'], //
        'data9.path' => ['required', 'string', 'max:100'],
        'data9.azimuth_ne' => ['required', 'string', 'max:100'],
        'data9.freq' => ['required', 'string', 'max:100'],
        'data9.diameter_antnefe' => ['required', 'string', 'max:100'],
        'data9.ant_nefe' => ['required', 'string', 'max:100'],
        'data9.min_losnefe' => ['required', 'string', 'max:100'],
        'data9.los_nlos' => ['required', 'string', 'max:100'],
        'data9.remark' => ['required', 'string', 'max:100'],
        'data9.tgl_drm' => ['required', 'date'],
        'data9.tgl_edrm' => ['required', 'date'],
        'data9.drm_stts' => ['required', 'string', 'max:100'],
    ];

    protected $validationAttributes  = [
        'data9.unik' => 'unik',
        'data9.unik_krdnt' => 'unik koordinat',
        'data9.id_site' => 'id site',
        'data9.site_name' => 'site name',
        'data9.ur_kandidat' => 'urutan kandidat',
        'data9.lat_kandidat' => 'lat kandidat',
        'data9.lon_kandidat' => 'long kandidat',
        'data9.dist_tonom' => 'distance to nom',
        'data9.sa_potcomm' => 'sa potensi community case',
        'data9.prop_rf' => 'proposed rf collo tp', //
        'data9.alamat' => 'alamat',
        'data9.azimuth' => 'azimuth',
        'data9.tipe_rf' => 'tipe rf',
        'data9.tipe_rru' => 'tipe rru',
        'data9.m_tilt' => 'm tilt',
        'data9.e_tilt' => 'e tilt',
        'data9.jum_sector' => 'jumlah sector', //
        'data9.siteid_fe' => 'site id fe',
        'data9.sitename_fe' => 'site name fe',
        'data9.lat_fe' => 'lat fe',
        'data9.lon_fe' => 'long fe',
        'data9.tp' => 'tp',
        'data9.tower_hghtfe' => 'tower height', //
        'data9.path' => 'path',
        'data9.azimuth_ne' => 'azimuth ne',
        'data9.freq' => 'freq',
        'data9.diameter_antnefe' => 'diameter ant ne fe',
        'data9.ant_nefe' => 'ant ne fe',
        'data9.min_losnefe' => 'minimum los ne fe',
        'data9.los_nlos' => 'los nlos',
        'data9.remark' => 'remarks',
        'data9.tgl_drm' => 'tanggal drm',
        'data9.tgl_edrm' => 'tanggal edrm',
        'data9.drm_stts' => 'drm status',
    ];

    public function deleteAction(Data2 $data9)
    {
        $this->resetErrorBag();
        $this->data9 = $data9;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-data9']);
    }

    public function deleteRow(Data2 $data9)
    {
        $this->resetErrorBag();
        $data9->delete();
        $this->data9 = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-data9']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data9']);
    }

    public function addRow(Data2 $data9)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data9 = $data9->create($data['data9']);
        $this->reset(['data9', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data9']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }

    public function editAction(Data2 $data9)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->data9 = $data9->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-data9']);
    }

    public function editRow(Data2 $data9)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->data9 = $data9->update($data['data9']);
        $this->reset(['data9', 'form_mode']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-data9']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }
}
