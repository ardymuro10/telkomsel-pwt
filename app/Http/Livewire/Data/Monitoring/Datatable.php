<?php

namespace App\Http\Livewire\Data\Monitoring;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Monitoring;

class Datatable extends DataTableComponent
{
    protected $model = Monitoring::class;

    protected $listeners = [
        'refresh-table' => 'refresh'
    ];

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
            Column::make("Site Id", "site_id")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("List Program", "list_program")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Status", "status")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Vendor", "vendor")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Last Update", "updated_at")
                ->sortable(),
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
