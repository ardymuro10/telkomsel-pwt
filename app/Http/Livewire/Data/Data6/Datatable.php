<?php

namespace App\Http\Livewire\Data\Data6;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Data6;
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
            Column::make("Branch", "branch")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Cluster", "cluster")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
           Column::make("DO", "do")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Id Desa", "id_desa")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Nama Desa", "nama_desa")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Nama Kecamatan", "nama_kec")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Nama Pulau", "nama_pul")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Nama Kabupaten", "nama_kab")
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
