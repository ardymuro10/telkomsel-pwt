<div>
    <x-flash-message/>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction">Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <livewire:mail-monitoring.different-data.datatable />
        </div>
    </div>


    <div class="modal fade" id="delete-different-data" tabindex="-1" role="dialog" aria-labelledby="delete-different-data-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-different-data-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $different_data['id'] ?? null }})">
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


    <div class="modal fade" id="edit-different-data" tabindex="-1" role="dialog" aria-labelledby="edit-different-data-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-different-data-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $different_data['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="different_data-name">Nama</label>
                                    <input type="text" class="form-control @error('different_data.name') is-invalid @enderror" id="different_data-name" placeholder="Nama" wire:model.defer="different_data.name">
                                    @error('different_data.name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="d-flex align-items-center" style="gap: 1rem;">
                                        <div class="form-check d-flex align-items-center">
                                            <input id="gender-male" class="form-check-input" type="radio" wire:model="different_data.gender"
                                            , value="laki-laki">
                                            <label for="gender-male" class="form-check-label">Laki-laki</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input id="gender-female" class="form-check-input" type="radio" wire:model="different_data.gender"
                                            , value="perempuan">
                                            <label for="gender-female" class="form-check-label">Perempuan</label>
                                        </div>
                                    </div>
                                    @error('different_data.gender')
                                        <span class="text-danger">
                                            <small><strong>{{ $message }}</strong></small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="different_data-birth_place">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('different_data.birth_place') is-invalid @enderror" id="different_data-birth_place" placeholder="Tempat Lahir" wire:model.defer="different_data.birth_place">
                                    @error('different_data.birth_place')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="different_data-birth_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('different_data.birth_date') is-invalid @enderror" id="different_data-birth_date" wire:model.defer="different_data.birth_date">
                                    @error('different_data.birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="different_data-rt">RT</label>
                                    <input type="number" class="form-control @error('different_data.rt') is-invalid @enderror" id="different_data-rt" placeholder="RT" wire:model.defer="different_data.rt">
                                    @error('different_data.rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="different_data-rw">RW</label>
                                    <input type="number" class="form-control @error('different_data.rw') is-invalid @enderror" id="different_data-rw" placeholder="RT" wire:model.defer="different_data.rw">
                                    @error('different_data.rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="different_data-address">Alamat</label>
                                    <textarea class="form-control @error('different_data.address') is-invalid @enderror" id="different_data-address" placeholder="Alamat" wire:model.defer="different_data.address"></textarea>
                                    @error('different_data.address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="different_data-identity_number">NIK</label>
                                    <input type="number" class="form-control @error('different_data.identity_number') is-invalid @enderror" id="different_data-identity_number" placeholder="NIK" wire:model.defer="different_data.identity_number">
                                    @error('different_data.identity_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="different_data-document">Dokumen</label>
                                    <input type="text" class="form-control @error('different_data.document') is-invalid @enderror" id="different_data-document" placeholder="Dokumen" wire:model.defer="different_data.document">
                                    @error('different_data.document')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="different_data-number">Nomor</label>
                                    <input type="text" class="form-control @error('different_data.number') is-invalid @enderror" id="different_data-number" placeholder="Nomor" wire:model.defer="different_data.number">
                                    @error('different_data.number')
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
