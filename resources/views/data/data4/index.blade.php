<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <livewire:data.data4.datatable />
        </div>
    </div>

    <div class="modal fade" id="delete-data4" tabindex="-1" role="dialog" aria-labelledby="delete-data4-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-data4-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $data4['id'] ?? null }})">
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

    <div class="modal fade" id="edit-data4" tabindex="-1" role="dialog" aria-labelledby="edit-data4-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-data4-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $data4['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data4-unik">Unik</label>
                                    <input type="text" class="form-control @error('data4.unik') is-invalid @enderror" id="data4-unik" placeholder="Unik" wire:model.defer="data4.unik">
                                    @error('data4.unik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data4-unik-krdnt">Unik Koordinat</label>
                                    <input type="text" class="form-control @error('data4.unik_krdnt') is-invalid @enderror" id="data4-unik-krdnt" placeholder="Unik Koordinat" wire:model.defer="data4.unik_krdnt">
                                    @error('data4.unik_krdnt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data4-id-site">Id Site</label>
                                    <input type="text" class="form-control @error('data4.id_site') is-invalid @enderror" id="data4-id-site" placeholder="Id Site" wire:model.defer="data4.id_site">
                                    @error('data4.id_site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data4-site-name">Site Name</label>
                                    <input type="text" class="form-control @error('data4.site_name') is-invalid @enderror" id="data4-site-name" placeholder="Site Name" wire:model.defer="data4.site_name">
                                    @error('data4.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data4-sow-infra">SOW Infra</label>
                                    <select class="form-control @error('data4.sow_infra') is-invalid @enderror" id="data4-sow-infra" wire:model.defer="data4.sow_infra">
                                        <option value="">Pilih</option>
                                        <option value="b2s">{{ Str::title('b2s') }}</option>
                                        <option value="collo tp">{{ Str::title('collo tp') }}</option>
                                    </select>
                                    @error('data4.sow_infra')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data4-infra-type">Infra Type</label>
                                    <input type="text" class="form-control @error('data4.infra_type') is-invalid @enderror" id="data4-infra-type" placeholder="Infra Type" wire:model.defer="data4.infra_type">
                                    @error('data4.infra_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data4-site-id-tp">Site Id TP</label>
                                    <input type="text" class="form-control @error('data4.site_id_tp') is-invalid @enderror" id="data4-site-id-tp" placeholder="Site Id TP" wire:model.defer="data4.site_id_tp">
                                    @error('data4.site_id_tp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data4-plan-tower-prov">Plan Tower Provider</label>
                                    <input type="text" class="form-control @error('data4.plan_tower_prov') is-invalid @enderror" id="data4-plan-tower-prov" placeholder="Plan Tower Provider" wire:model.defer="data4.plan_tower_prov">
                                    @error('data4.plan_tower_prov')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data4-tower-hg">Tower Height</label>
                                    <input type="text" class="form-control @error('data4.tower_hg') is-invalid @enderror" id="data4-tower-hg" placeholder="Tower Height" wire:model.defer="data4.tower_hg">
                                    @error('data4.tower_hg')
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
