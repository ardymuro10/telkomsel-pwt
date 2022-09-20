<?php

namespace App\Http\Livewire\PublicComplaint;

use App\Models\PublicComplaint;
use Livewire\Component;

class Index extends Component
{
    public $public_complaint;

    protected $listeners = [
        'deleteAction',
    ];

    public function render()
    {
        return view('public-complaint.index')
        ->layoutData([
            'title' => 'Pengaduan Masyarakat'
        ]);
    }

    public function deleteAction(PublicComplaint $public_complaint)
    {
        $this->public_complaint = $public_complaint;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-public-complaint']);
    }

    public function deleteRow(PublicComplaint $public_complaint)
    {
        $public_complaint->delete();
        $this->public_complaint = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-public-complaint']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }
}
