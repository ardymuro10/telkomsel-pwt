<?php

namespace App\Http\Livewire\Data\Data5;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Data5;
use App\Models\Data2;

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
        $this->setDefaultSort('id');
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
            Column::make("ISD (m) To Tsel", "isd_totsel")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("ISD CAT To Tsel", "isd_cattotsel")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Terdekat", "site_terdekat")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("ISD (m) To TP", "isd_totp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("ISD CAT To TP", "isd_cattotp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("TP Id", "tp_id")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("TP Name", "tp_name")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Tower Height", "tower_hgview")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("ISD (m) To Competitor", "isd_tocomp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("ISD CAT To Competitor", "isd_cattocomp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Kompetitor", "kompet")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("ISD Usulan JPP", "isd_usuljpp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Name", "sitename_rev")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Luas HouseHold (km2)", "luas_hh")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("MR Bad (<=-105)", "mrbad")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("MR Good (>-105)", "mrgood")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Total", "total")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Percentage Bad MR", "per_badmr")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("MR 4G Coverage", "mr_4gcov")
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
