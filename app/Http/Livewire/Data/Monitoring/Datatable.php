<?php

namespace App\Http\Livewire\Data\Monitoring;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Monitoring;
use Illuminate\Support\Str;

class Datatable extends DataTableComponent
{
    protected $model = Monitoring::class;

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
            Column::make("Site Id", "site_id")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Site Name", "site_name")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Program", "program")
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return Str::upper($value);
                }),
            Column::make("List Program", "list_program")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Infra Type", "type_infra")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Owner Infra", "owner_infra")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Status", "status")
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return Str::title($value);
                }),
            Column::make("Issue", "issue")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Vendor", "vendor")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Last Update", "updated_at")
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
