<div>
    <x-flash-message/>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction">Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <livewire:user-list.datatable />
        </div>
    </div>

    <div class="modal fade" id="delete-user-list" tabindex="-1" role="dialog" aria-labelledby="delete-user-list-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-user-list-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $user_list['id'] ?? null }})">
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

    <div class="modal fade" id="edit-user-list" tabindex="-1" role="dialog" aria-labelledby="edit-user-list-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-user-list-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $user_list['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_list-name">Nama</label>
                                    <input type="text" class="form-control @error('user_list.name') is-invalid @enderror" id="user_list-name" placeholder="Nama" wire:model.defer="user_list.name">
                                    @error('user_list.name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_list-telegram_id">Id Telegram</label>
                                    <input type="text" class="form-control @error('user_list.telegram_id') is-invalid @enderror" id="user_list-telegram_id" placeholder="Id Telegram" wire:model.defer="user_list.telegram_id">
                                    @error('user_list.telegram_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_list-nohp">Nomor Handphone</label>
                                    <input type="text" class="form-control @error('user_list.nohp') is-invalid @enderror" id="user_list-nohp" placeholder="Nomor Handphone" wire:model.defer="user_list.nohp">
                                    @error('user_list.nohp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_list-address">Alamat</label>
                                    <textarea class="form-control @error('user_list.address') is-invalid @enderror" id="user_list-address" placeholder="Alamat" wire:model.defer="user_list.address"></textarea>
                                    @error('user_list.address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_list-rt">RT</label>
                                    <input type="number" class="form-control @error('user_list.rt') is-invalid @enderror" id="user_list-rt" placeholder="RT" wire:model.defer="user_list.rt">
                                    @error('user_list.rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_list-rw">RW</label>
                                    <input type="number" class="form-control @error('user_list.rw') is-invalid @enderror" id="user_list-rw" placeholder="RT" wire:model.defer="user_list.rw">
                                    @error('user_list.rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
