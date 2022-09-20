<div>
    <x-flash-message/>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction">Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <livewire:mail-monitoring.certificate.datatable />
        </div>
    </div>


    <div class="modal fade" id="delete-certificate" tabindex="-1" role="dialog" aria-labelledby="delete-certificate-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-certificate-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $certificate['id'] ?? null }})">
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


    <div class="modal fade" id="edit-certificate" tabindex="-1" role="dialog" aria-labelledby="edit-certificate-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-certificate-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $certificate['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="certificate-name">Nama</label>
                                    <input type="text" class="form-control @error('certificate.name') is-invalid @enderror" id="certificate-name" placeholder="Nama" wire:model.defer="certificate.name">
                                    @error('certificate.name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="certificate-identity_number">NIK</label>
                                    <input type="number" class="form-control @error('certificate.identity_number') is-invalid @enderror" id="certificate-identity_number" placeholder="NIK" wire:model.defer="certificate.identity_number">
                                    @error('certificate.identity_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="certificate-birth_place">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('certificate.birth_place') is-invalid @enderror" id="certificate-birth_place" placeholder="Tempat Lahir" wire:model.defer="certificate.birth_place">
                                    @error('certificate.birth_place')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="certificate-birth_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('certificate.birth_date') is-invalid @enderror" id="certificate-birth_date" wire:model.defer="certificate.birth_date">
                                    @error('certificate.birth_date')
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
                                            <input id="gender-male" class="form-check-input" type="radio" wire:model="certificate.gender"
                                            , value="laki-laki">
                                            <label for="gender-male" class="form-check-label">Laki-laki</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input id="gender-female" class="form-check-input" type="radio" wire:model="certificate.gender"
                                            , value="perempuan">
                                            <label for="gender-female" class="form-check-label">Perempuan</label>
                                        </div>
                                    </div>
                                    @error('certificate.gender')
                                        <span class="text-danger">
                                            <small><strong>{{ $message }}</strong></small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="certificate-nationality">Warga Negara</label>
                                    <select class="form-control @error('certificate.nationality') is-invalid @enderror" id="certificate-nationality" wire:model.defer="certificate.nationality">
                                        <option value="">Pilih</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                    @error('certificate.nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="certificate-religion">Agama</label>
                                    <select class="form-control @error('certificate.religion') is-invalid @enderror" id="certificate-religion" wire:model.defer="certificate.religion">
                                        <option value="">Pilih</option>
                                        <option value="islam">{{ Str::title('islam') }}</option>
                                        <option value="katolik">{{ Str::title('katolik') }}</option>
                                        <option value="protestan">{{ Str::title('protestan') }}</option>
                                        <option value="hindu">{{ Str::title('hindu') }}</option>
                                        <option value="budha">{{ Str::title('budha') }}</option>
                                        <option value="khonghucu">{{ Str::title('khonghucu') }}</option>
                                        <option value="lainnya">{{ Str::title('lainnya') }}</option>
                                    </select>
                                    @error('certificate.religion')
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
                                    <label for="certificate-rt">RT</label>
                                    <input type="number" class="form-control @error('certificate.rt') is-invalid @enderror" id="certificate-rt" placeholder="RT" wire:model.defer="certificate.rt">
                                    @error('certificate.rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="certificate-rw">RW</label>
                                    <input type="number" class="form-control @error('certificate.rw') is-invalid @enderror" id="certificate-rw" placeholder="RT" wire:model.defer="certificate.rw">
                                    @error('certificate.rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="certificate-address">Alamat</label>
                                    <textarea class="form-control @error('certificate.address') is-invalid @enderror" id="certificate-address" placeholder="Alamat" wire:model.defer="certificate.address"></textarea>
                                    @error('certificate.address')
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
