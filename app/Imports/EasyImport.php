<?php

namespace App\Imports;

use App\Models\EasyPole;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EasyImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EasyPole([
            // 'nama kolom db' => $row['nama kolom excel'],
            // 'id' => $row['no'],
            'area' => $row['area'],
            'region' => $row['region'],
            'site_id' => $row['site_id'],
            'site_name' => $row['site_name'],
            'lat' => $row['lat'],
            'long' => $row['long'],
            'site_id_pole' => $row['site_id'],
            'site_name_pole' => $row['site_name'],
            'lat_pole' => $row['lat'],
            'long_pole' => $row['long'],
            'type_easypole' => $row['type_easy_pole'],
            'propose_mitra_pole' => $row['propose_mitra_pole'],
            'propose_mitra_fo' => $row['propose_mitra_fo'],
            'komit_revreg' => $row['komitment_revenue_regional'],
            'avg_revsur' => $row['avg_revenue_surrounding_1st_tier'],
            'rev_shifa' => $row['revenue_shifa'],
            'dis_poletobbu' => $row['distance_pole_to_bbu'],
            'dis_poletosite' => $row['distance_pole_to_site_terdekat'],
            'front_hauldis' => $row['front_haul_distance'],
            'objective' => $row['objective'],
            'priority' => $row['priority'],
        ]);
    }
}
