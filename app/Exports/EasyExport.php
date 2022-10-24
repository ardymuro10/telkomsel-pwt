<?php

namespace App\Exports;

use App\Models\EasyPole;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EasyExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EasyPole::all();
    }

    public function headings(): array
    {
        return[
            'No',
            'Area',
            'Region',
            'Site Id',
            'Site Name',
            'Lat',
            'Long',
            'Site Id',
            'site Name',
            'Lat',
            'Long',
            'Type Easy Pole',
            'Propose Mitra Pole',
            'Propose Mitra Fo',
            'Komitment Revenue Regional',
            'Avg Revenue Surrounding 1st Tier',
            'Revenue Shifa',
            'Distance Pole to BBU',
            'Distance Pole to Site Terdekat',
            'Front Haul Distance',
            'Objective',
            'Priority',

            'Dibuat Pada',
            'Diedit Pada',
        ];
    }
}
