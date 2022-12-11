<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <div>
                <livewire:data.data6.datatable />
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-data6" tabindex="-1" role="dialog" aria-labelledby="delete-data6-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-data6-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $data6['id'] ?? null }})">
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

    <div class="modal fade" id="edit-data6" tabindex="-1" role="dialog" aria-labelledby="edit-data6-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-data6-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $data6['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data6-unik">Unik</label>
                                    <input type="text" class="form-control @error('data6.unik') is-invalid @enderror" id="data6-unik" placeholder="Unik" wire:model.defer="data6.unik">
                                    @error('data6.unik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-unik-krdnt">Unik Koordinat</label>
                                    <input type="text" class="form-control @error('data6.unik_krdnt') is-invalid @enderror" id="data6-unik-krdnt" placeholder="Unik Koordinat" wire:model.defer="data6.unik_krdnt">
                                    @error('data6.unik_krdnt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-id-site">Id Site</label>
                                    <input type="text" class="form-control @error('data6.id_site') is-invalid @enderror" id="data6-id-site" placeholder="Id Site" wire:model.defer="data6.id_site">
                                    @error('data6.id_site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-site-name">Site Name</label>
                                    <input type="text" class="form-control @error('data6.site_name') is-invalid @enderror" id="data6-site-name" placeholder="Site Name" wire:model.defer="data6.site_name">
                                    @error('data6.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-branch">Branch</label>
                                    <input type="text" class="form-control @error('data6.branch') is-invalid @enderror" id="data6-branch" placeholder="Branch" wire:model.defer="data6.branch">
                                    @error('data6.branch')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-cluster">Cluster</label>
                                    <input type="text" class="form-control @error('data6.cluster') is-invalid @enderror" id="data6-cluster" placeholder="Cluster" wire:model.defer="data6.cluster">
                                    @error('data6.cluster')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-do">DO</label>
                                    <input type="text" class="form-control @error('data6.do') is-invalid @enderror" id="data6-do" placeholder="DO" wire:model.defer="data6.do">
                                    @error('data6.do')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-id-desa">Id Desa</label>
                                    <input type="text" class="form-control @error('data6.id_desa') is-invalid @enderror" id="data6-id-desa" placeholder="Id Desa" wire:model.defer="data6.id_desa">
                                    @error('data6.id_desa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-nama-desa">Nama Desa</label>
                                    <input type="text" class="form-control @error('data6.nama_desa') is-invalid @enderror" id="data6-nama-desa" placeholder="Nama Desa" wire:model.defer="data6.nama_desa">
                                    @error('data6.nama_desa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-nama-kec">Nama Kecamatan</label>
                                    <input type="text" class="form-control @error('data6.nama_kec') is-invalid @enderror" id="data6-nama-kec" placeholder="Nama Kecamatan" wire:model.defer="data6.nama_kec">
                                    @error('data6.nama_kec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-nama-pul">Nama Pulau</label>
                                    <input type="text" class="form-control @error('data6.nama_pul') is-invalid @enderror" id="data6-nama-pul" placeholder="Nama Pulau" wire:model.defer="data6.nama_pul">
                                    @error('data6.nama_pul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data6-nama-kab">Nama Kabupaten</label>
                                    <input type="text" class="form-control @error('data6.nama_kab') is-invalid @enderror" id="data6-nama-kab" placeholder="Nama Kabupaten" wire:model.defer="data6.nama_kab">
                                    @error('data6.nama_kab')
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
