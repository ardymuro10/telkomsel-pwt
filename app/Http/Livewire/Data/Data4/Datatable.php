<?php

namespace App\Http\Livewire\Data\Data4;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Data4;
use App\Models\Data2;
use Illuminate\Support\Str;

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
            Column::make('Unik Koordinat', 'id')
                ->format(function($value, $row, Column $column) {
                    return view('components.datatable.showlonglat', [
                        'value' => $value
                    ]);
                }),
            Column::make("Site Id", "id_site")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Name", "site_name")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("SOW Infra", "sow_infra")
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return Str::title($value);
                }),
            Column::make("Infra Type", "infra_type")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Id TP", "site_id_tp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Plan Tower Provider", "plan_tower_prov")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Tower Height", "tower_hg")
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
