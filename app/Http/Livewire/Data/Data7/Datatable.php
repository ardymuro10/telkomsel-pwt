<?php

namespace App\Http\Livewire\Data\Data7;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Data7;
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
            Column::make("REG REV Projection", "reg_rev_proj")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Komitment Revenue (Branch)", "kom_rev")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("REV CAT (Priority)", "rev_cat_pr")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Potensi NS/Branch", "pot_nsbranch")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Arpu Kecamatan", "arpu_kec")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Rank per NS/Branch", "rank_perns")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Priority SRM", "prior_srm")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Rank Regional", "rank_reg")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Rank RTPE", "rank_rtpe")
                ->sortable()
                ->searchable()
                ->collapseOnTablet(),
            Column::make("Priority Final Regional", "prior_finreg")
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
