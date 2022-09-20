<div>
    <x-flash-message/>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction">Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <livewire:mail-monitoring.mail-poor.datatable />
        </div>
    </div>

    <div class="modal fade" id="delete-mail-poor" tabindex="-1" role="dialog" aria-labelledby="delete-mail-poor-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-mail-poor-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $mail_poor['id'] ?? null }})">
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


    <div class="modal fade" id="edit-mail-poor" tabindex="-1" role="dialog" aria-labelledby="edit-mail-poor-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-mail-poor-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $mail_poor['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail_poor-name">Nama</label>
                                    <input type="text" class="form-control @error('mail_poor.name') is-invalid @enderror" id="mail_poor-name" placeholder="Nama" wire:model.defer="mail_poor.name">
                                    @error('mail_poor.name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_poor-identity_number">NIK</label>
                                    <input type="number" class="form-control @error('mail_poor.identity_number') is-invalid @enderror" id="mail_poor-identity_number" placeholder="NIK" wire:model.defer="mail_poor.identity_number">
                                    @error('mail_poor.identity_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail_poor-birth_place">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('mail_poor.birth_place') is-invalid @enderror" id="mail_poor-birth_place" placeholder="Tempat Lahir" wire:model.defer="mail_poor.birth_place">
                                    @error('mail_poor.birth_place')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mail_poor-birth_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('mail_poor.birth_date') is-invalid @enderror" id="mail_poor-birth_date" wire:model.defer="mail_poor.birth_date">
                                    @error('mail_poor.birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail_poor-occupation">Pekerjaan</label>
                                    <input type="text" class="form-control @error('mail_poor.occupation') is-invalid @enderror" id="mail_poor-occupation" placeholder="Pekerjaan" wire:model.defer="mail_poor.occupation">
                                    @error('mail_poor.occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="d-flex align-items-center" style="gap: 1rem;">
                                        <div class="form-check d-flex align-items-center">
                                            <input id="gender-male" class="form-check-input" type="radio" wire:model="mail_poor.gender"
                                            , value="laki-laki">
                                            <label for="gender-male" class="form-check-label">Laki-laki</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input id="gender-female" class="form-check-input" type="radio" wire:model="mail_poor.gender"
                                            , value="perempuan">
                                            <label for="gender-female" class="form-check-label">Perempuan</label>
                                        </div>
                                    </div>
                                    @error('mail_poor.gender')
                                        <span class="text-danger">
                                            <small><strong>{{ $message }}</strong></small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail_poor-rt">RT</label>
                                    <input type="number" class="form-control @error('mail_poor.rt') is-invalid @enderror" id="mail_poor-rt" placeholder="RT" wire:model.defer="mail_poor.rt">
                                    @error('mail_poor.rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mail_poor-rw">RW</label>
                                    <input type="number" class="form-control @error('mail_poor.rw') is-invalid @enderror" id="mail_poor-rw" placeholder="RT" wire:model.defer="mail_poor.rw">
                                    @error('mail_poor.rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail_poor-address">Alamat</label>
                                    <textarea class="form-control @error('mail_poor.address') is-invalid @enderror" id="mail_poor-address" placeholder="Alamat" wire:model.defer="mail_poor.address"></textarea>
                                    @error('mail_poor.address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail_poor-necessity">Keperluan</label>
                                    <input type="text" class="form-control @error('mail_poor.necessity') is-invalid @enderror" id="mail_poor-necessity" placeholder="Keperluan" wire:model.defer="mail_poor.necessity">
                                    @error('mail_poor.necessity')
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
