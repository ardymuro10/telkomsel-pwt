<?php

namespace App\Http\Livewire\UserList;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UserList;
use Carbon\Carbon;

class Datatable extends DataTableComponent
{
    protected $model = UserList::class;

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
            Column::make('ID Telegram', 'telegram_id')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return $value ?? '-';
                }),
            Column::make('Nama', 'name')
                ->sortable()
                ->searchable(),
            Column::make('No. Hp', 'nohp')
                ->sortable()
                ->searchable(),
                Column::make('Alamat', 'address')
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return $row->address.' RT. '.($row->rt == '' || $row->rt == null ? '-' : $row->rt).' RW. '.($row->rw == '' || $row->rw == null ? '-' : $row->rw);
                }),
            Column::make('RT', 'rt')
                ->sortable()
                ->searchable()
                ->hideIf(true),
            Column::make('RT', 'rw')
                ->sortable()
                ->searchable()
                ->hideIf(true),
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
