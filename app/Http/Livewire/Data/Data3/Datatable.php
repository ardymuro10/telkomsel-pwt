<?php

namespace App\Http\Livewire\Data\Data3;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Data3;
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
            Column::make("Lat", "lat")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Long", "long")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Special Program JPP", "sp_prog_jpp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Objective", "objective")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("SOW", "sow")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Program JPP 2023", "prog_jpp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Program JPP 2023 Simple", "prog_jppsimple")
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
