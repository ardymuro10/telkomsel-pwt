<?php

namespace App\Http\Livewire\Data\Data9;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Data9;
use App\Models\Data2;
use Carbon\Carbon;

class Datatable extends DataTableComponent
{
    protected $model = Data2::class;

    protected $listeners = [
        'refresh-table' => 'refresh'
    ];

    public function refresh()
    {
        //
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
        $this->setColumnSelectStatus(false);
        $this->setTheadAttributes([
            'class' => 'text-nowrap',
        ]);
        $this->setTdAttributes(function(Column $column, $row, $columnIndex) {
            return [
                'default' => true,
                'class' => 'align-middle'
            ];
        });
        $this->setTableAttributes([
            'class' => 'table-bordered',
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Unik", "unik")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Unik Koordinat", "unik_krdnt")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Id", "id_site")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Name", "site_name")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Urutan Kandidat", "ur_kandidat")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Lat Kandidat", "lat_kandidat")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Long Kandidat", "lon_kandidat")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Distance to NOM", "dist_tonom")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("SA, Potensi Community Case", "sa_potcomm")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Proposed RF Collo TP", "prop_rf")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Alamat", "alamat")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Azimuth", "azimuth")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Tipe RF", "tipe_rf")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Tipe RRU", "tipe_rru")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("M Tilt", "m_tilt")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("E Tilt", "e_tilt")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Jumlah Sector", "jum_sector")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Id FE", "siteid_fe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Name FE", "sitename_fe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Lat", "lat_fe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Long", "lon_fe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("TP", "tp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Tower Height", "tower_hghtfe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Path", "path")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Azimuth NE", "azimuth_ne")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Freq", "freq")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Diameter Ant NE-FE", "diameter_antnefe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Ant NE-FE", "ant_nefe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Minimum LOS (NE/FE)", "min_losnefe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("LOS/NLOS", "los_nlos")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Remarks", "remark")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('DRM Date', 'tgl_drm')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return Carbon::parse($value)->isoFormat('DD MMMM YYYY');
                }),
            Column::make('E-DRM Date', 'tgl_edrm')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return Carbon::parse($value)->isoFormat('DD MMMM YYYY');
                }),
            Column::make("DRM Status", "drm_stts")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('Opsi', 'id')
                ->format(function($value, $row, Column $column) {
                    return view('components.datatable.action', [
                        'action' => [
                            'delete', 'edit'
                        ],
                        'value' => $value
                    ]);
                })
        ];
    }
}
