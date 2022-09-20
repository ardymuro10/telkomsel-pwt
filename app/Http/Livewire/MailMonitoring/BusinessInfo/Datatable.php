<?php

namespace App\Http\Livewire\MailMonitoring\BusinessInfo;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BusinessInfo;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Datatable extends DataTableComponent
{
    protected $model = BusinessInfo::class;

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
                })
                ->hideIf(true),
            Column::make('Nama', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Nomor NIK', 'identity_number')
                ->sortable()
                ->searchable(),
            Column::make('Tempat Lahir', 'birth_place')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('Tanggal Lahir', 'birth_date')
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return Carbon::parse($value)->isoFormat('DD MMMM YYYY');
                }),
            Column::make('Status Perkawinan', 'marriage_status')
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return Str::title($value);
                }),
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
            Column::make('Jenis Usaha', 'jenisusaha')
                ->sortable()
                ->searchable(),
            Column::make('Jenis Barang/Jasa Dagangan', 'jenisbarang')
                ->sortable()
                ->searchable(),
            Column::make('Mulai Usaha Tahun', 'mulaiusaha')
                ->sortable()
                ->searchable(),
            Column::make('Lokasi Usaha', 'lokasiusaha')
                ->sortable()
                ->searchable(),
            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),
            Column::make('', 'id')
                ->format(function($value, $row, Column $column) {
                    return view('components.datatable.action', [
                        'action' => [
                            'delete', 'edit', 'print'
                        ],
                        'value' => $value
                    ]);
                })
        ];
    }
}
