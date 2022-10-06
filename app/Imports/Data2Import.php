<?php

namespace App\Imports;

use App\Models\Data2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Data2Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data2([
            // 'nama kolom db' => $row['nama kolom excel'],
            'unik' => $row['unik'],
            'unik_krdnt' => $row['unik_koordinat'],
            'id_site' => $row['site_id'],
            'site_name' => $row['site_name'],
            'infra_type' => $row['infra_type'],
            'site_id_tp' => $row['site_id_tp'],
            'plan_tower_prov' => $row['plan_tower_provider'],
            'tower_hg' => $row['tower_height'],
        ]);
    }
}
