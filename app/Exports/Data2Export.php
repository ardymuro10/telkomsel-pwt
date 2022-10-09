<?php

namespace App\Exports;

use App\Models\Data2;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Data2Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data2::all();
    }

    public function headings(): array
    {
        return[
            'no',
            'unik',
            'unik_koordinat',
            'site_id',
            'site_name',

            //eqp
            'lat',
            'long',
            'special_program_jpp',
            'objective',
            'sow',
            'program_jpp_2023',
            'program_jpp_2023_simple',
            'jpp_part',
            'remark_jpp',

            //tower
            'infra_type',
            'site_id_tp',
            'plan_tower_provider',
            'tower_height',

            //review
            'isd_m_to_tsel',
            'isd_cat_to_tsel',
            'site_terdekat',
            'isd_m_to_tp',
            'isd_cat_to_tp',
            'tp_id',
            'tp_name',
            'tower_height',
            'isd_m_to_competitor',
            'isd_cat_to_competitor',
            'kompetitor',
            'isd_usulan_jpp',
            'site_name',
            'luas_household_km2',
            'mr_bad_105',
            'mr_good_105',
            'total',
            'percentage_bad_mr',
            'mr_4g_coverage',

            //demografi
            'branch',
            'cluster',
            'do',
            'id_desa',
            'nama_desa',
            'nama_kecamatan',
            'nama_pulau',
            'nama_kabupaten',

            //sales
            'reg_rev_projection_update_3_oct_2021',
            'komitment_revenue_branch',
            'rev_cat_priority',
            'potensi_nsbranch',
            'arpu_kecamatan',
            'rank_per_nsbranch',
            'priority_srm',
            'rank_regional',
            'rank_rtpe',
            'priority_final_regional',
        ];
    }
}
