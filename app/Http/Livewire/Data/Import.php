<?php

namespace App\Http\Livewire\Data;

use App\Imports\Data2Import;
use App\Exports\Data2Export;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Data2;

class Import extends Component
{
    use WithFileUploads;
    public $file;

    public function export()
    {
        return Excel::download(new Data2Export, 'data-program-jpp.xlsx');
    }

    public function submit()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx, xls'
        ]);

        Excel::import(new Data2Import, $this->file);

        session()->flash('success', 'Berhasil menambahkan data dari file.');

        // dd($this->file);
    }

    public function render()
    {
        return view('data.import')
        ->layoutData([
            'title' => 'Import'
        ]);;
    }
}
