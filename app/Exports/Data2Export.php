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
            'No',
            'Unik',
            'Unik Koordinat',
            'Site Id',
            'Site Name',

            //eqp
            'Lat',
            'Long',
            'Special Program JPP',
            'Objective',
            'Sow',
            'Program JPP 2023',
            'Program JPP 2023 Simple',
            'JPP Part',
            'Remark JPP',

            //tower
            'SOW Infra',
            'Infra Type',
            'Site Id TP',
            'Plan Tower Provider',
            'Tower Height',

            //review
            'ISD (m) to Tsel',
            'ISD Cat to Tsel',
            'Site Terdekat',
            'ISD (m) to TP',
            'ISD CAT to TP',
            'TP Id',
            'TP Name',
            'Tower Height',
            'ISD (m) to Competitor',
            'ISD Cat to Competitor',
            'Kompetitor',
            'ISD Usulan JPP',
            'ISD CAT',
            'Site Name',
            'Luas HouseHold (km2)',
            'MR Bad (<=-105)',
            'MR Good (>-105)',
            'Total',
            'Percentage Bad MR',
            'MR 4G Coverage',

            //demografi
            'Branch',
            'Cluster',
            'DO',
            'Id Desa',
            'Nama Desa',
            'Nama Kecamatan',
            'Nama Pulau',
            'Nama Kabupaten',

            //sales
            'REG REV Projection (Update 3 Oct 2021)',
            'Komitment Revenue (Branch)',
            'REV CAT (Priority)',
            'Potensi NS/Branch',
            'Arpu Kecamatan',
            'Rank per NS/Branch',
            'Priority SRM',
            'Rank Regional',
            'Rank RTPE',
            'Priority Final Regional',

            //powertrans
            'Pre Survey Potensi Power',
            'PLN',
            'Assessment LOS',
            'Site Id Far End',
            'Config FE',
            'Minimal LOS',
            'Simple Transport',

            //drm
            'Urutan Kandidat',
            'Lat Kandidat',
            'Long Kandidat',
            'Distance to NOM',
            'SA, Potensi Community Case',
            'Proposed RF Collo TP',
            'Alamat',
            'Azimuth',
            'Tipe RF',
            'Tipe RRU',
            'M Tilt',
            'E Tilt',
            'Jumlah Sector',
            'Site ID FE',
            'Site Name FE',
            'Lat',
            'Long',
            'TP',
            'Tower Height',
            'Path',
            'Azimuth NE',
            'Freq',
            'Diameter Ant NE-FE',
            'Ant NE-FE',
            'Minimum LOS (NE/FE)',
            'LOS/NLOS',
            'Remarks',
            'DRM Date',
            'E-DRM Date',
            'DRM Status',

            //komreport
            'No. KOM/KKST',
            'TP',
            'Tanggal KOM',
            'CP EQP',
            'Pre Sales',
            'Aging',
            'Batch Final',
            'Progress (simple)',
            'Need Support ke Management',
            'Detail Progress (dari Project Deployment)',
            'Need Form Survey',
            'Remark',

            'Dibuat Pada',
            'Diedit Pada',

        ];
    }
}
