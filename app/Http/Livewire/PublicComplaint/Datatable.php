<?php

namespace App\Http\Livewire\PublicComplaint;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PublicComplaint;
use Carbon\Carbon;

class Datatable extends DataTableComponent
{
    protected $model = PublicComplaint::class;

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
            Column::make('Tanggal Pengaduan', 'created_at')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return Carbon::parse($value)->isoFormat('DD MMMM YYYY HH:mm');
                }),
            Column::make('ID Telegram', 'telegram_id')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return $value ?? '-';
                })
                ->hideIf(true),
            Column::make('Nama', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Pengaduan', 'complaint')
                ->sortable()
                ->searchable(),
            Column::make('', 'id')
                ->format(function($value, $row, Column $column) {
                    return view('components.datatable.action', [
                        'action' => [
                            'delete'
                        ],
                        'value' => $value
                    ]);
                })
        ];
    }
}
