<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <div>
                <livewire:data.data5.datatable />
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-data5" tabindex="-1" role="dialog" aria-labelledby="delete-data5-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-data5-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $data5['id'] ?? null }})">
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

    <div class="modal fade" id="edit-data5" tabindex="-1" role="dialog" aria-labelledby="edit-data5-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-data5-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $data5['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data5-unik">Unik</label>
                                    <input type="text" class="form-control @error('data5.unik') is-invalid @enderror" id="data5-unik" placeholder="Unik" wire:model.defer="data5.unik">
                                    @error('data5.unik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-unik-krdnt">Unik Koordinat</label>
                                    <input type="text" class="form-control @error('data5.unik_krdnt') is-invalid @enderror" id="data5-unik-krdnt" placeholder="Unik Koordinat" wire:model.defer="data5.unik_krdnt">
                                    @error('data5.unik_krdnt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-id-site">Id Site</label>
                                    <input type="text" class="form-control @error('data5.id_site') is-invalid @enderror" id="data5-id-site" placeholder="Id Site" wire:model.defer="data5.id_site">
                                    @error('data5.id_site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-site-name">Site Name</label>
                                    <input type="text" class="form-control @error('data5.site_name') is-invalid @enderror" id="data5-site-name" placeholder="Site Name" wire:model.defer="data5.site_name">
                                    @error('data5.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-isd-totsel">ISD (m) To Tsel</label>
                                    <input type="text" class="form-control @error('data5.isd_totsel') is-invalid @enderror" id="data5-isd-totsel" placeholder="ISD (m) To Tsel" wire:model.defer="data5.isd_totsel">
                                    @error('data5.isd_totsel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-isd-cattotsel">ISD CAT To Tsel</label>
                                    <input type="text" class="form-control @error('data5.isd_cattotsel') is-invalid @enderror" id="data5-isd-cattotsel" placeholder="ISD CAT To Tsel" wire:model.defer="data5.isd_cattotsel">
                                    @error('data5.isd_cattotsel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-site-terdekat">Site Terdekat</label>
                                    <input type="text" class="form-control @error('data5.site_terdekat') is-invalid @enderror" id="data5-site-terdekat" placeholder="Site Terdekat" wire:model.defer="data5.site_terdekat">
                                    @error('data5.site_terdekat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-isd-totp">ISD (m) To TP</label>
                                    <input type="text" class="form-control @error('data5.isd_totp') is-invalid @enderror" id="data5-isd-totp" placeholder="ISD (m) To TP" wire:model.defer="data5.isd_totp">
                                    @error('data5.isd_totp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-isd-cattotp">ISD CAT To TP</label>
                                    <input type="text" class="form-control @error('data5.isd_cattotp') is-invalid @enderror" id="data5-isd-cattotp" placeholder="ISD CAT To TP" wire:model.defer="data5.isd_cattotp">
                                    @error('data5.isd_cattotp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-tp-id">TP Id</label>
                                    <input type="text" class="form-control @error('data5.tp_id') is-invalid @enderror" id="data5-tp-id" placeholder="TP Id" wire:model.defer="data5.tp_id">
                                    @error('data5.tp_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-tp-name">TP Name</label>
                                    <input type="text" class="form-control @error('data5.tp_name') is-invalid @enderror" id="data5-tp-name" placeholder="TP Name" wire:model.defer="data5.tp_name">
                                    @error('data5.tp_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-tower-hgview">Tower Height</label>
                                    <input type="text" class="form-control @error('data5.tower_hgview') is-invalid @enderror" id="data5-tower-hgview" placeholder="Tower Height" wire:model.defer="data5.tower_hgview">
                                    @error('data5.tower_hgview')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-isd_tocomp">ISD (m) To Competitor</label>
                                    <input type="text" class="form-control @error('data5.isd_tocomp') is-invalid @enderror" id="data5-isd_tocomp" placeholder="ISD (m) To Competitor" wire:model.defer="data5.isd_tocomp">
                                    @error('data5.isd_tocomp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-isd-cattocomp">ISD CAT To Competitor</label>
                                    <input type="text" class="form-control @error('data5.isd_cattocomp') is-invalid @enderror" id="data5-isd-cattocomp" placeholder="ISD CAT To Competitor" wire:model.defer="data5.isd_cattocomp">
                                    @error('data5.isd_cattocomp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-kompet">Kompetitor</label>
                                    <input type="text" class="form-control @error('data5.kompet') is-invalid @enderror" id="data5-kompet" placeholder="Kompetitor" wire:model.defer="data5.kompet">
                                    @error('data5.kompet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-isd-usuljpp">ISD Usulan JPP</label>
                                    <input type="text" class="form-control @error('data5.isd_usuljpp') is-invalid @enderror" id="data5-isd-usuljpp" placeholder="ISD Usulan JPP" wire:model.defer="data5.isd_usuljpp">
                                    @error('data5.isd_usuljpp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data5-isd-cat">ISD CAT</label>
                                    <input type="text" class="form-control @error('data5.isd_cat') is-invalid @enderror" id="data5-isd-cat" placeholder="ISD CAT" wire:model.defer="data5.isd_cat">
                                    @error('data5.isd_cat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data5-sitename-rev">Site Name</label>
                                    <input type="text" class="form-control @error('data5.sitename_rev') is-invalid @enderror" id="data5-sitename-rev" placeholder="Site Name" wire:model.defer="data5.sitename_rev">
                                    @error('data5.sitename_rev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-luas-hh">Luas HouseHold (km2)</label>
                                    <input type="text" class="form-control @error('data5.luas_hh') is-invalid @enderror" id="data5-luas-hh" placeholder="Luas HouseHold (km2)" wire:model.defer="data5.luas_hh">
                                    @error('data5.luas_hh')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-mrbad">MR Bad (<=-105)</label>
                                    <input type="text" class="form-control @error('data5.mrbad') is-invalid @enderror" id="data5-mrbad" placeholder="MR Bad (<=-105)" wire:model.defer="data5.mrbad">
                                    @error('data5.mrbad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-mrgood">MR Good (>-105)</label>
                                    <input type="text" class="form-control @error('data5.mrgood') is-invalid @enderror" id="data5-mrgood" placeholder="MR Good (>-105)" wire:model.defer="data5.mrgood">
                                    @error('data5.mrgood')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-total">Total</label>
                                    <input type="text" class="form-control @error('data5.total') is-invalid @enderror" id="data5-total" placeholder="Total" wire:model.defer="data5.total">
                                    @error('data5.total')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-per-badmr">Percentage Bad MR</label>
                                    <input type="text" class="form-control @error('data5.per_badmr') is-invalid @enderror" id="data5-per-badmr" placeholder="Percentage Bad MR" wire:model.defer="data5.per_badmr">
                                    @error('data5.per_badmr')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data5-mr-4gcov">MR 4G Coverage</label>
                                    <input type="text" class="form-control @error('data5.mr_4gcov') is-invalid @enderror" id="data5-mr-4gcov" placeholder="MR 4G Coverage" wire:model.defer="data5.mr_4gcov">
                                    @error('data5.mr_4gcov')
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
