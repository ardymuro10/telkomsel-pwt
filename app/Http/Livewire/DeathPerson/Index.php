<?php

namespace App\Http\Livewire\DeathPerson;

use App\Models\DeathPerson;
use Livewire\Component;

class Index extends Component
{
    public $death_person, $mode;

    protected $listeners = [
        'deleteAction',
        'editAction'
    ];

    public $form_mode = [
        'add' => [
            'action' => 'addRow',
            'text' => 'Tambah'
        ],
        'edit' => [
            'action' => 'editRow',
            'text' => 'Edit'
        ]
    ];

    protected $rules = [
        'death_person.name' => ['required', 'string', 'max:255'],
        'death_person.birth_date' => ['required', 'date'],
        'death_person.burial_date' => ['required', 'date'],
        'death_person.burial_place' => ['required', 'string', 'max:255'],
    ];

    protected $validationAttributes  = [
        'death_person.name' => 'nama',
        'death_person.birth_date' => 'tanggal lahir',
        'death_person.burial_date' => 'tanggal meninggal',
        'death_person.burial_place' => 'tempat pemakaman',
    ];

    public function mount()
    {
        $this->mode = 'add';
    }

    public function render()
    {
        return view('death-person.index')
        ->layoutData([
            'title' => 'Data Orang Meninggal'
        ]);
    }

    public function editAction(DeathPerson $death_person)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->death_person = $death_person->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-death-person']);
    }

    public function editRow(DeathPerson $death_person)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->death_person = $death_person->update($data['death_person']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-death-person']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }

    public function deleteAction(DeathPerson $death_person)
    {
        $this->resetErrorBag();
        $this->death_person = $death_person;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-death-person']);
    }

    public function deleteRow(DeathPerson $death_person)
    {
        $this->resetErrorBag();
        $death_person->delete();
        $this->death_person = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-death-person']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-death-person']);
    }

    public function addRow(DeathPerson $death_person)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->death_person = $death_person->create($data['death_person']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-death-person']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }
}
