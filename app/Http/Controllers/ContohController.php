<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContohController extends Controller
{
    public function contoh()
    {
        $filename = 'contoh.xlsx';
        $path = public_path('file/'.$filename);

        return response()->download($path, $filename, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'inline; filename-"' . $filename . '"'
        ]);
    }

    public function contoheasy()
    {
        $filename = 'contoheasy.xlsx';
        $path = public_path('file/'.$filename);

        return response()->download($path, $filename, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'inline; filename-"' . $filename . '"'
        ]);
    }
}
