<?php

namespace App\Http\Livewire\UserList;

use App\Models\UserList;
use Livewire\Component;

class Index extends Component
{
    public $user_list, $mode;

    protected $listeners = [
        'deleteAction',
        'editAction',
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
        'user_list.telegram_id' => ['required', 'string', 'max:255'],
        'user_list.name' => ['required', 'string', 'max:255'],
        'user_list.nohp' => ['required', 'string', 'max:255'],
        'user_list.rt' => ['nullable', 'string', 'max:5'],
        'user_list.rw' => ['nullable', 'string', 'max:5'],
        'user_list.address' => ['required', 'string', 'max:255'],
    ];

    protected $validationAttributes  = [
        'user_list.telegram_id' => 'id telegram',
        'user_list.name' => 'nama',
        'user_list.nohp' => 'no hp',
        'user_list.rt' => 'rt',
        'user_list.rw' => 'rw',
        'user_list.address' => 'alamat',
    ];

    public function mount()
    {
        $this->mode = 'add';
    }

    public function render()
    {
        return view('user-list.index')
        ->layoutData([
            'title' => 'Daftar Pengguna'
        ]);
    }

    public function deleteAction(UserList $user_list)
    {
        $this->user_list = $user_list;
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'delete-user-list']);
    }

    public function deleteRow(UserList $user_list)
    {
        $user_list->delete();
        $this->user_list = null;
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'delete-user-list']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menghapus data');
    }

    public function editAction(UserList $user_list)
    {
        $this->mode = 'edit';
        $this->resetErrorBag();
        $this->user_list = $user_list->toArray();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-user-list']);
    }

    public function editRow(UserList $user_list)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->user_list = $user_list->update($data['user_list']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-user-list']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil mengubah data');
    }

    public function addAction()
    {
        $this->mode = 'add';
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('modal-show', ['modal' => 'edit-user-list']);
    }

    public function addRow(UserList $user_list)
    {
        $this->resetErrorBag();
        $data = $this->validate();
        $this->user_list = $user_list->create($data['user_list']);
        $this->dispatchBrowserEvent('modal-hide', ['modal' => 'edit-user-list']);
        $this->emit('refresh-table');
        session()->flash('success', 'Berhasil menambahkan data');
    }
}
