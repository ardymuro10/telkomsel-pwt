<div>
    <x-flash-message/>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction">Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <livewire:mail-monitoring.business-info.datatable />
        </div>
    </div>

    <div class="modal fade" id="delete-business-info" tabindex="-1" role="dialog" aria-labelledby="delete-business-info-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-business-info-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $business_info ['id'] ?? null }})">
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


    <div class="modal fade" id="edit-business-info" tabindex="-1" role="dialog" aria-labelledby="edit-business-info-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-business-info-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $business_info ['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_info-name">Nama</label>
                                    <input type="text" class="form-control @error('business_info.name') is-invalid @enderror" id="business_info-name" placeholder="Nama" wire:model.defer="business_info.name">
                                    @error('business_info.name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_info-identity_number">NIK</label>
                                    <input type="number" class="form-control @error('business_info.identity_number') is-invalid @enderror" id="business_info-identity_number" placeholder="NIK" wire:model.defer="business_info.identity_number">
                                    @error('business_info.identity_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="business_info-birth_place">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('business_info.birth_place') is-invalid @enderror" id="business_info-birth_place" placeholder="Tempat Lahir" wire:model.defer="business_info.birth_place">
                                    @error('business_info.birth_place')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="business_info-birth_date">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('business_info.birth_date') is-invalid @enderror" id="business_info-birth_date" wire:model.defer="business_info.birth_date">
                                    @error('business_info.birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="business_info-marriage_status">Status Perkawinan</label>
                                    <input type="text" class="form-control @error('business_info.marriage_status') is-invalid @enderror" id="business_info-marriage_status" wire:model.defer="business_info.marriage_status">
                                    @error('business_info.marriage_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="business_info-marriage_status">Status Perkawinan</label>
                                    <select class="form-control @error('business_info.marriage_status') is-invalid @enderror" id="business_info-marriage_status" wire:model.defer="business_info.marriage_status">
                                        <option value="">Pilih</option>
                                        <option value="kawin">{{ Str::title('kawin') }}</option>
                                        <option value="belum kawin">{{ Str::title('belum kawin') }}</option>
                                        <option value="cerai">{{ Str::title('cerai') }}</option>
                                    </select>
                                    @error('business_info.marriage_status')
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
                                    <label for="business_info-rt">RT</label>
                                    <input type="number" class="form-control @error('business_info.rt') is-invalid @enderror" id="business_info-rt" placeholder="RT" wire:model.defer="business_info.rt">
                                    @error('business_info.rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_info-rw">RW</label>
                                    <input type="number" class="form-control @error('business_info.rw') is-invalid @enderror" id="business_info-rw" placeholder="RT" wire:model.defer="business_info.rw">
                                    @error('business_info.rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="business_info-address">Alamat</label>
                                    <textarea class="form-control @error('business_info.address') is-invalid @enderror" id="business_info-address" placeholder="Alamat" wire:model.defer="business_info.address"></textarea>
                                    @error('business_info.address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_info-jenisusaha">Jenis Usaha</label>
                                    <input type="text" class="form-control @error('business_info.jenisusaha') is-invalid @enderror" id="business_info-jenisusaha" placeholder="Jenis Usaha" wire:model.defer="business_info.jenisusaha">
                                    @error('business_info.jenisusaha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="business_info-jenisbarang">Jenis Barang</label>
                                    <input type="text" class="form-control @error('business_info.jenisbarang') is-invalid @enderror" id="business_info-jenisbarang" placeholder="Jenis Barang" wire:model.defer="business_info.jenisbarang">
                                    @error('business_info.jenisbarang')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_info-mulaiusaha">Mulai Usaha Tahun</label>
                                    <input type="number" class="form-control @error('business_info.mulaiusaha') is-invalid @enderror" id="business_info-mulaiusaha" placeholder="Mulai Usaha Tahun" wire:model.defer="business_info.mulaiusaha">
                                    @error('business_info.mulaiusaha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="business_info-lokasiusaha">Lokasi Usaha</label>
                                    <input type="text" class="form-control @error('business_info.lokasiusaha') is-invalid @enderror" id="business_info-lokasiusaha" placeholder="Lokasi Usaha" wire:model.defer="business_info.lokasiusaha">
                                    @error('business_info.lokasiusaha')
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
