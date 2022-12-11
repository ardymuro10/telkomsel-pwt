<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <div>
                <livewire:data.data8.datatable />
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-data8" tabindex="-1" role="dialog" aria-labelledby="delete-data8-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-data8-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $data8['id'] ?? null }})">
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

    <div class="modal fade" id="edit-data8" tabindex="-1" role="dialog" aria-labelledby="edit-data8-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-data8-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $data8['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data8-unik">Unik</label>
                                    <input type="text" class="form-control @error('data8.unik') is-invalid @enderror" id="data8-unik" placeholder="Unik" wire:model.defer="data8.unik">
                                    @error('data8.unik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data8-unik-krdnt">Unik Koordinat</label>
                                    <input type="text" class="form-control @error('data8.unik_krdnt') is-invalid @enderror" id="data8-unik-krdnt" placeholder="Unik Koordinat" wire:model.defer="data8.unik_krdnt">
                                    @error('data8.unik_krdnt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data8-id-site">Id Site</label>
                                    <input type="text" class="form-control @error('data8.id_site') is-invalid @enderror" id="data8-id-site" placeholder="Id Site" wire:model.defer="data8.id_site">
                                    @error('data8.id_site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data8-site-name">Site Name</label>
                                    <input type="text" class="form-control @error('data8.site_name') is-invalid @enderror" id="data8-site-name" placeholder="Site Name" wire:model.defer="data8.site_name">
                                    @error('data8.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data8-pre-surveipot">Pre Survey Potensi Power</label>
                                    <input type="text" class="form-control @error('data8.pre_surveipot') is-invalid @enderror" id="data8-pre-surveipot" placeholder="Pre Survey Potensi Power" wire:model.defer="data8.pre_surveipot">
                                    @error('data8.pre_surveipot')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data8-pln">PLN</label>
                                    <input type="text" class="form-control @error('data8.pln') is-invalid @enderror" id="data8-pln" placeholder="PLN" wire:model.defer="data8.pln">
                                    @error('data8.pln')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data8-ass-los">Assessment LOS</label>
                                    <input type="text" class="form-control @error('data8.ass_los') is-invalid @enderror" id="data8-ass-los" placeholder="Assessment LOS" wire:model.defer="data8.ass_los">
                                    @error('data8.ass_los')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data8-siteid-farend">Site Id Far End</label>
                                    <input type="text" class="form-control @error('data8.siteid_farend') is-invalid @enderror" id="data8-siteid-farend" placeholder="Site Id Far End" wire:model.defer="data8.siteid_farend">
                                    @error('data8.siteid_farend')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data8-configfe">Config FE</label>
                                    <input type="text" class="form-control @error('data8.configfe') is-invalid @enderror" id="data8-configfe" placeholder="Config FE" wire:model.defer="data8.configfe">
                                    @error('data8.configfe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data8-min-los">Minimal LOS</label>
                                    <input type="text" class="form-control @error('data8.min_los') is-invalid @enderror" id="data8-min-los" placeholder="Minimal LOS" wire:model.defer="data8.min_los">
                                    @error('data8.min_los')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data8-simple-trans">Simple Transport</label>
                                    <input type="text" class="form-control @error('data8.simple_trans') is-invalid @enderror" id="data8-simple-trans" placeholder="Simple Transport" wire:model.defer="data8.simple_trans">
                                    @error('data8.simple_trans')
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
