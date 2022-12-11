<?php

namespace App\Http\Livewire\Data\Data10;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Data10;
use App\Models\Data2;
use Carbon\Carbon;

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
            Column::make("No. KOM/KKST", "no_komkkst")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("TP", "tp_komkkst")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Tanggal KOM", "tgl_kom")
                ->sortable()
                ->searchable()
                ->format(function($value, $row, Column $column) {
                    return Carbon::parse($value)->isoFormat('DD MMMM YYYY');
                }),
            Column::make("CP EQP", "cp_eqp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Pre Sales", "pre_sales")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Aging", "aging")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Batch Final", "batch_final")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Progress (Simple)", "prog_sim")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Need Support ke Management", "need_supp")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Detail Progress (Dari Project Deployment)", "detail_prog")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Need Form Survey", "need_form")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Remark", "remark_rep")
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
