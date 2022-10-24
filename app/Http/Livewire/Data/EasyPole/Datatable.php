<?php

namespace App\Http\Livewire\Data\EasyPole;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\EasyPole;

class Datatable extends DataTableComponent
{
    protected $model = EasyPole::class;

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
            Column::make("Area", "area")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Region", "region")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Id (BBU)", "site_id")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Name (BBU)", "site_name")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Lat (BBU)", "lat")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Long (BBU)", "long")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Id (Pole)", "site_id_pole")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Name (Pole)", "site_name_pole")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Lat (Pole)", "lat_pole")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Long (Pole)", "long_pole")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Type Easy Pole", "type_easypole")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Propose Mitra Pole", "propose_mitra_pole")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Propose Mitra FO", "propose_mitra_fo")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Komitment Revenue Regional", "komit_revreg")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Avg Revenue Surrounding (1'st tier)", "avg_revsur")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Revenue Shifa", "rev_shifa")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Distance Pole to BBU", "dis_poletobbu")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Distance Pole to Site Terdekat", "dis_poletosite")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Front Haul Distance", "front_hauldis")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Objective", "objective")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Priority", "priority")
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
