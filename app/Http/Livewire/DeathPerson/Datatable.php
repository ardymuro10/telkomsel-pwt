<?php

namespace App\Http\Livewire\DeathPerson;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\DeathPerson;
use Carbon\Carbon;

class Datatable extends DataTableComponent
{
    protected $model = DeathPerson::class;

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
            Column::make('Nama', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Tanggal Lahir', 'birth_date')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return Carbon::parse($value)->isoFormat('DD MMMM YYYY');
                }),
            Column::make('Tanggal Meninggal', 'burial_date')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return Carbon::parse($value)->isoFormat('DD MMMM YYYY');
                }),
            Column::make('Tempat Pemakaman', 'burial_place')
                ->sortable()
                ->searchable(),
            Column::make('', 'id')
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
