<?php

namespace App\Http\Livewire\Data\Data8;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Data2;
use App\Models\Data8;

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
            Column::make("Pre Survey Potensi Power", "pre_surveipot")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("PLN", "pln")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Assessment LOS", "ass_los")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Id Far End", "siteid_farend")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Config FE", "configfe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Minimal LOS", "min_los")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Simple Transport", "simple_trans")
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
