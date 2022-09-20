<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction">Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <livewire:death-person.datatable />
        </div>
    </div>

    <div class="modal fade" id="delete-death-person" tabindex="-1" role="dialog" aria-labelledby="delete-death-person-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-death-person-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $death_person['id'] ?? null }})">
                    <div class="modal-body">
                        <p>Anda yakin menghapus data ini ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-death-person" tabindex="-1" role="dialog" aria-labelledby="edit-death-person-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-death-person-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $death_person['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="death-person-name">Nama</label>
                            <input type="text" class="form-control @error('death_person.name') is-invalid @enderror" id="death-person-name" placeholder="Nama" wire:model.defer="death_person.name">
                            @error('death_person.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="death-person-birth-date">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('death_person.birth_date') is-invalid @enderror" id="death-person-birth-date" wire:model.defer="death_person.birth_date">
                            @error('death_person.birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="death-person-burial-date">Tanggal Meninggal</label>
                            <input type="date" class="form-control @error('death_person.burial_date') is-invalid @enderror" id="death-person-burial-date" wire:model.defer="death_person.burial_date">
                            @error('death_person.burial_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="death-person-burial-place">Tempat Pemakaman</label>
                            <input type="text" class="form-control @error('death_person.burial_place') is-invalid @enderror" id="death-person-burial-place" placeholder="Tempat Pemakaman" wire:model.defer="death_person.burial_place">
                            @error('death_person.burial_place')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
