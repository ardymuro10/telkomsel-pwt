<?php

namespace App\Http\Livewire\MailMonitoring\CoverLetter;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\CoverLetter;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Datatable extends DataTableComponent
{
    protected $model = CoverLetter::class;

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
            Column::make('Nama Lengkap', 'name')
                ->sortable()
                ->searchable(),
            Column::make('NIK', 'identity_number')
                ->sortable()
                ->searchable(),
            Column::make('Jenis Kelamin', 'gender')
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return Str::title($value);
                }),
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
            Column::make('Warga Negara', 'nationality')
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return Str::title($value);
                }),
            Column::make('Agama', 'religion')
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return Str::title($value);
                }),
            Column::make('Status Perkawinan', 'marriage_status')
                ->sortable()
                ->searchable()
                ->collapseOnTablet()
                ->format(function($value, $row, Column $column) {
                    return Str::title($value);
                }),
            Column::make('Pekerjaan', 'occupation')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('Pendidikan', 'education')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
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
            Column::make('Surat Bukti Diri', 'proof_of_self')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return $value ?? '-';
                }),
            Column::make('Keperluan', 'necessity')
                ->sortable()
                ->searchable(),
            Column::make('Berlaku Mulai', 'valid_from')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return Carbon::parse($value)->isoFormat('DD MMMM YYYY');
                }),
            Column::make('Keterangan', 'description')
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make('Tanggal Pembuatan', 'created_at')
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return Carbon::parse($value)->isoFormat('DD MMMM YYYY HH:mm');
                })
                ->hideIf(true),
            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),
                // ->format(function ($value, $row, Column $column) {
                //     return $value . ': asu';
                // }),
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
