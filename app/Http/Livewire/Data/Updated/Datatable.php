<?php

namespace App\Http\Livewire\Data\Updated;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
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
            Column::make("Id site", "id_site")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site name", "site_name")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
        ];
    }
}
