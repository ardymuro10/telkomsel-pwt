<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <div>
                <livewire:data.data7.datatable />
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-data7" tabindex="-1" role="dialog" aria-labelledby="delete-data7-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-data7-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $data7['id'] ?? null }})">
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

    <div class="modal fade" id="edit-data7" tabindex="-1" role="dialog" aria-labelledby="edit-data7-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-data7-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $data7['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data7-unik">Unik</label>
                                    <input type="text" class="form-control @error('data7.unik') is-invalid @enderror" id="data7-unik" placeholder="Unik" wire:model.defer="data7.unik">
                                    @error('data7.unik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data7-unik-krdnt">Unik Koordinat</label>
                                    <input type="text" class="form-control @error('data7.unik_krdnt') is-invalid @enderror" id="data7-unik-krdnt" placeholder="Unik Koordinat" wire:model.defer="data7.unik_krdnt">
                                    @error('data7.unik_krdnt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data7-id-site">Id Site</label>
                                    <input type="text" class="form-control @error('data7.id_site') is-invalid @enderror" id="data7-id-site" placeholder="Id Site" wire:model.defer="data7.id_site">
                                    @error('data7.id_site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data7-site-name">Site Name</label>
                                    <input type="text" class="form-control @error('data7.site_name') is-invalid @enderror" id="data7-site-name" placeholder="Site Name" wire:model.defer="data7.site_name">
                                    @error('data7.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data7-reg-rev-proj">REG REV Projection</label>
                                    <input type="text" class="form-control @error('data7.reg_rev_proj') is-invalid @enderror" id="data7-reg-rev-proj" placeholder="REG REV Projection" wire:model.defer="data7.reg_rev_proj">
                                    @error('data7.reg_rev_proj')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data7-kom-rev">Komitment Revenue (Branch)</label>
                                    <input type="text" class="form-control @error('data7.kom_rev') is-invalid @enderror" id="data7-kom-rev" placeholder="Komitment Revenue (Branch)" wire:model.defer="data7.kom_rev">
                                    @error('data7.kom_rev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data7-rev-cat-pr">REV CAT (Priority)</label>
                                    <input type="text" class="form-control @error('data7.rev_cat_pr') is-invalid @enderror" id="data7-rev-cat-pr" placeholder="REV CAT (Priority)" wire:model.defer="data7.rev_cat_pr">
                                    @error('data7.rev_cat_pr')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data7-pot-nsbranch">Potensi NS/Branch</label>
                                    <input type="text" class="form-control @error('data7.pot_nsbranch') is-invalid @enderror" id="data7-pot-nsbranch" placeholder="Potensi NS/Branch" wire:model.defer="data7.pot_nsbranch">
                                    @error('data7.pot_nsbranch')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data7-arpu-kec">Arpu Kecamatan</label>
                                    <input type="text" class="form-control @error('data7.arpu_kec') is-invalid @enderror" id="data7-arpu-kec" placeholder="Arpu Kecamatan" wire:model.defer="data7.arpu_kec">
                                    @error('data7.arpu_kec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data7-rank-perns">Rank per NS/Branch</label>
                                    <input type="text" class="form-control @error('data7.rank_perns') is-invalid @enderror" id="data7-rank-perns" placeholder="Rank per NS/Branch" wire:model.defer="data7.rank_perns">
                                    @error('data7.rank_perns')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data7-prior-srm">Priority SRM</label>
                                    <input type="text" class="form-control @error('data7.prior_srm') is-invalid @enderror" id="data7-prior-srm" placeholder="Id Desa" wire:model.defer="data7.prior_srm">
                                    @error('data7.prior_srm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data7-rank-reg">Rank Regional</label>
                                    <input type="text" class="form-control @error('data7.rank_reg') is-invalid @enderror" id="data7-rank-reg" placeholder="Rank Regional" wire:model.defer="data7.rank_reg">
                                    @error('data7.rank_reg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data7-rank-rtpe">Rank RTPE</label>
                                    <input type="text" class="form-control @error('data7.rank_rtpe') is-invalid @enderror" id="data7-rank-rtpe" placeholder="Rank RTPE" wire:model.defer="data7.rank_rtpe">
                                    @error('data7.rank_rtpe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data7-prior-finreg">Priority Final Regional</label>
                                    <input type="text" class="form-control @error('data7.prior_finreg') is-invalid @enderror" id="data7-prior-finreg" placeholder="Priority Final Regional" wire:model.defer="data7.prior_finreg">
                                    @error('data7.prior_finreg')
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
