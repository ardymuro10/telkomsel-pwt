<div>
    <x-flash-message/>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction">Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <livewire:mail-monitoring.cover-letter.datatable />
        </div>
    </div>

    <div class="modal fade" id="delete-cover-letter" tabindex="-1" role="dialog" aria-labelledby="delete-cover-letter-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cover-letter-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $cover_letter['id'] ?? null }})">
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

    <div class="modal fade" id="edit-cover-letter" tabindex="-1" role="dialog" aria-labelledby="edit-cover-letter-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-cover-letter-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $cover_letter['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cover-letter-name">Nama</label>
                                    <input type="text" class="form-control @error('cover_letter.name') is-invalid @enderror" id="cover-letter-name" placeholder="Nama" wire:model.defer="cover_letter.name">
                                    @error('cover_letter.name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cover-letter-identity_number">NIK</label>
                                    <input type="number" class="form-control @error('cover_letter.identity_number') is-invalid @enderror" id="cover-letter-identity_number" placeholder="NIK" wire:model.defer="cover_letter.identity_number">
                                    @error('cover_letter.identity_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="d-flex align-items-center" style="gap: 1rem;">
                                        <div class="form-check d-flex align-items-center">
                                            <input id="gender-male" class="form-check-input" type="radio" wire:model="cover_letter.gender"
                                            , value="laki-laki">
                                            <label for="gender-male" class="form-check-label">Laki-laki</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center">
                                            <input id="gender-female" class="form-check-input" type="radio" wire:model="cover_letter.gender"
                                            , value="perempuan">
                                            <label for="gender-female" class="form-check-label">Perempuan</label>
                                        </div>
                                    </div>
                                    @error('cover_letter.gender')
                                        <span class="text-danger">
                                            <small><strong>{{ $message }}</strong></small>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cover-letter-birth_place">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('cover_letter.birth_place') is-invalid @enderror" id="cover-letter-birth_place" placeholder="Tempat Lahir" wire:model.defer="cover_letter.birth_place">
                                    @error('cover_letter.birth_place')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cover-letter-birth_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('cover_letter.birth_date') is-invalid @enderror" id="cover-letter-birth_date" wire:model.defer="cover_letter.birth_date">
                                    @error('cover_letter.birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cover-letter-nationality">Warga Negara</label>
                                    <select class="form-control @error('cover_letter.nationality') is-invalid @enderror" id="cover-letter-nationality" wire:model.defer="cover_letter.nationality">
                                        <option value="">Pilih</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                    @error('cover_letter.nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cover-letter-religion">Agama</label>
                                    <select class="form-control @error('cover_letter.religion') is-invalid @enderror" id="cover-letter-religion" wire:model.defer="cover_letter.religion">
                                        <option value="">Pilih</option>
                                        <option value="islam">{{ Str::title('islam') }}</option>
                                        <option value="katolik">{{ Str::title('katolik') }}</option>
                                        <option value="protestan">{{ Str::title('protestan') }}</option>
                                        <option value="hindu">{{ Str::title('hindu') }}</option>
                                        <option value="budha">{{ Str::title('budha') }}</option>
                                        <option value="khonghucu">{{ Str::title('khonghucu') }}</option>
                                        <option value="lainnya">{{ Str::title('lainnya') }}</option>
                                    </select>
                                    @error('cover_letter.religion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cover-letter-marriage_status">Status Perkawinan</label>
                                    <select class="form-control @error('cover_letter.marriage_status') is-invalid @enderror" id="cover-letter-marriage_status" wire:model.defer="cover_letter.marriage_status">
                                        <option value="">Pilih</option>
                                        <option value="kawin">{{ Str::title('kawin') }}</option>
                                        <option value="belum kawin">{{ Str::title('belum kawin') }}</option>
                                        <option value="cerai">{{ Str::title('cerai') }}</option>
                                    </select>
                                    @error('cover_letter.marriage_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cover-letter-occupation">Pekerjaan</label>
                                    <input type="text" class="form-control @error('cover_letter.occupation') is-invalid @enderror" id="cover-letter-occupation" placeholder="Pekerjaan" wire:model.defer="cover_letter.occupation">
                                    @error('cover_letter.occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cover-letter-education">Pendidikan</label>
                                    <select class="form-control @error('cover_letter.education') is-invalid @enderror" id="cover-letter-education" wire:model.defer="cover_letter.education">
                                        <option value="">Pilih</option>
                                        <option value="SD">SD</option>
                                        <option value="SLTP">SLTP</option>
                                        <option value="SLTA">SLTA</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                    @error('cover_letter.education')
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
                                    <label for="cover-letter-rt">RT</label>
                                    <input type="number" class="form-control @error('cover_letter.rt') is-invalid @enderror" id="cover-letter-rt" placeholder="RT" wire:model.defer="cover_letter.rt">
                                    @error('cover_letter.rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cover-letter-rw">RW</label>
                                    <input type="number" class="form-control @error('cover_letter.rw') is-invalid @enderror" id="cover-letter-rw" placeholder="RT" wire:model.defer="cover_letter.rw">
                                    @error('cover_letter.rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cover-letter-address">Alamat</label>
                                    <textarea class="form-control @error('cover_letter.address') is-invalid @enderror" id="cover-letter-address" placeholder="Alamat" wire:model.defer="cover_letter.address"></textarea>
                                    @error('cover_letter.address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="cover-letter-proof_of_self">Surat Bukti Diri</label>
                            <textarea class="form-control @error('cover_letter.proof_of_self') is-invalid @enderror" id="cover-letter-proof_of_self" placeholder="Surat Bukti Diri" wire:model.defer="cover_letter.proof_of_self"></textarea>
                            @error('cover_letter.proof_of_self')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover-letter-necessity">Keperluan</label>
                            <textarea class="form-control @error('cover_letter.necessity') is-invalid @enderror" id="cover-letter-necessity" placeholder="Keperluan" wire:model.defer="cover_letter.necessity"></textarea>
                            @error('cover_letter.necessity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover-letter-valid_from">Tanggal Berlaku</label>
                            <input type="date" class="form-control @error('cover_letter.valid_from') is-invalid @enderror" id="cover-letter-valid_from" placeholder="RT" wire:model.defer="cover_letter.valid_from">
                            @error('cover_letter.valid_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover-letter-description">Keterangan</label>
                            <textarea class="form-control @error('cover_letter.description') is-invalid @enderror" id="cover-letter-description" placeholder="Keterangan" wire:model.defer="cover_letter.description"></textarea>
                            @error('cover_letter.description')
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
