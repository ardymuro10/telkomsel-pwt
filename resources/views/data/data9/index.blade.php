<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <div>
                <livewire:data.data9.datatable />
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-data9" tabindex="-1" role="dialog" aria-labelledby="delete-data9-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-data9-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $data9['id'] ?? null }})">
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

    <div class="modal fade" id="edit-data9" tabindex="-1" role="dialog" aria-labelledby="edit-data9-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-data9-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $data9['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data9-unik">Unik</label>
                                    <input type="text" class="form-control @error('data9.unik') is-invalid @enderror" id="data9-unik" placeholder="Unik" wire:model.defer="data9.unik">
                                    @error('data9.unik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-unik-krdnt">Unik Koordinat</label>
                                    <input type="text" class="form-control @error('data9.unik_krdnt') is-invalid @enderror" id="data9-unik-krdnt" placeholder="Unik Koordinat" wire:model.defer="data9.unik_krdnt">
                                    @error('data9.unik_krdnt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-id-site">Id Site</label>
                                    <input type="text" class="form-control @error('data9.id_site') is-invalid @enderror" id="data9-id-site" placeholder="Id Site" wire:model.defer="data9.id_site">
                                    @error('data9.id_site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-site-name">Site Name</label>
                                    <input type="text" class="form-control @error('data9.site_name') is-invalid @enderror" id="data9-site-name" placeholder="Site Name" wire:model.defer="data9.site_name">
                                    @error('data9.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data9-ur-kandidat">Urutan Kandidat</label>
                                    <input type="text" class="form-control @error('data9.ur_kandidat') is-invalid @enderror" id="data9-ur-kandidat" placeholder="Urutan Kandidat" wire:model.defer="data9.ur_kandidat">
                                    @error('data9.ur_kandidat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-lat-kandidat">Lat Kandidat</label>
                                    <input type="text" class="form-control @error('data9.lat_kandidat') is-invalid @enderror" id="data9-lat-kandidat" placeholder="Lat Kandidat" wire:model.defer="data9.lat_kandidat">
                                    @error('data9.lat_kandidat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-lon-kandidat">Long Kandidat</label>
                                    <input type="text" class="form-control @error('data9.lon_kandidat') is-invalid @enderror" id="data9-lon-kandidat" placeholder="Long Kandidat" wire:model.defer="data9.lon_kandidat">
                                    @error('data9.lon_kandidat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-dist-tonom">Distance to NOM</label>
                                    <input type="text" class="form-control @error('data9.dist_tonom') is-invalid @enderror" id="data9-dist-tonom" placeholder="Distance to NOM" wire:model.defer="data9.dist_tonom">
                                    @error('data9.dist_tonom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-sa-potcomm">SA, Potensi Community Case</label>
                                    <input type="text" class="form-control @error('data9.sa_potcomm') is-invalid @enderror" id="data9-sa-potcomm" placeholder="SA, Potensi Community Case" wire:model.defer="data9.sa_potcomm">
                                    @error('data9.sa_potcomm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-prop-rf">Proposed RF Collo TP</label>
                                    <input type="text" class="form-control @error('data9.prop_rf') is-invalid @enderror" id="data9-prop-rf" placeholder="Proposed RF Collo TP" wire:model.defer="data9.prop_rf">
                                    @error('data9.prop_rf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-alamat">Alamat</label>
                                    <input type="text" class="form-control @error('data9.alamat') is-invalid @enderror" id="data9-alamat" placeholder="Alamat" wire:model.defer="data9.alamat">
                                    @error('data9.alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data9-azimuth">Azimuth</label>
                                    <input type="text" class="form-control @error('data9.azimuth') is-invalid @enderror" id="data9-azimuth" placeholder="Azimuth" wire:model.defer="data9.azimuth">
                                    @error('data9.azimuth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data9-tipe-rf">Tipe RF</label>
                                    <input type="text" class="form-control @error('data9.tipe_rf') is-invalid @enderror" id="data9-tipe-rf" placeholder="Tipe RF" wire:model.defer="data9.tipe_rf">
                                    @error('data9.tipe_rf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data9-tipe-rru">Tipe RRU</label>
                                    <input type="text" class="form-control @error('data9.tipe_rru') is-invalid @enderror" id="data9-tipe-rru" placeholder="Tipe RRU" wire:model.defer="data9.tipe_rru">
                                    @error('data9.tipe_rru')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data9-m-tilt">M Tilt</label>
                                    <input type="text" class="form-control @error('data9.m_tilt') is-invalid @enderror" id="data9-m-tilt" placeholder="M Tilt" wire:model.defer="data9.m_tilt">
                                    @error('data9.m_tilt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data9-e-tilt">E Tilt</label>
                                    <input type="text" class="form-control @error('data9.e_tilt') is-invalid @enderror" id="data9-e-tilt" placeholder="E Tilt" wire:model.defer="data9.e_tilt">
                                    @error('data9.e_tilt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data9-jum-sector">Jumlah Sector</label>
                                    <input type="text" class="form-control @error('data9.jum_sector') is-invalid @enderror" id="data9-jum-sector" placeholder="Jumlah Sector" wire:model.defer="data9.jum_sector">
                                    @error('data9.jum_sector')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-siteid-fe">Site Id FE</label>
                                    <input type="text" class="form-control @error('data9.siteid_fe') is-invalid @enderror" id="data9-siteid-fe" placeholder="Site Id FE" wire:model.defer="data9.siteid_fe">
                                    @error('data9.siteid_fe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-sitename-fe">Site Name FE</label>
                                    <input type="text" class="form-control @error('data9.sitename_fe') is-invalid @enderror" id="data9-sitename-fe" placeholder="Site Name FE" wire:model.defer="data9.sitename_fe">
                                    @error('data9.sitename_fe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data9-lat-fe">Lat</label>
                                    <input type="text" class="form-control @error('data9.lat_fe') is-invalid @enderror" id="data9-lat-fe" placeholder="Lat" wire:model.defer="data9.lat_fe">
                                    @error('data9.lat_fe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data9-lon-fe">Long</label>
                                    <input type="text" class="form-control @error('data9.lon_fe') is-invalid @enderror" id="data9-lon-fe" placeholder="Long" wire:model.defer="data9.lon_fe">
                                    @error('data9.lon_fe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="data9-tp">TP</label>
                                    <input type="text" class="form-control @error('data9.tp') is-invalid @enderror" id="data9-tp" placeholder="TP" wire:model.defer="data9.tp">
                                    @error('data9.tp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-tower-hghtfe">Tower Height</label>
                                    <input type="text" class="form-control @error('data9.tower_hghtfe') is-invalid @enderror" id="data9-tower-hghtfe" placeholder="Tower Height" wire:model.defer="data9.tower_hghtfe">
                                    @error('data9.tower_hghtfe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-path">Path</label>
                                    <input type="text" class="form-control @error('data9.path') is-invalid @enderror" id="data9-path" placeholder="Path" wire:model.defer="data9.path">
                                    @error('data9.path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-azimuth-ne">Azimuth NE</label>
                                    <input type="text" class="form-control @error('data9.azimuth_ne') is-invalid @enderror" id="data9-azimuth-ne" placeholder="Azimuth NE" wire:model.defer="data9.azimuth_ne">
                                    @error('data9.azimuth_ne')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-freq">Freq</label>
                                    <input type="text" class="form-control @error('data9.freq') is-invalid @enderror" id="data9-freq" placeholder="Freq" wire:model.defer="data9.freq">
                                    @error('data9.freq')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-diameter-antnefe">Diameter Ant NE-FE</label>
                                    <input type="text" class="form-control @error('data9.diameter_antnefe') is-invalid @enderror" id="data9-diameter-antnefe" placeholder="Diameter Ant NE-FE" wire:model.defer="data9.diameter_antnefe">
                                    @error('data9.diameter_antnefe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-ant-nefe">Ant NE-FE</label>
                                    <input type="text" class="form-control @error('data9.ant_nefe') is-invalid @enderror" id="data9-ant-nefe" placeholder="Ant NE-FE" wire:model.defer="data9.ant_nefe">
                                    @error('data9.ant_nefe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-min-losnefe">Minimum LOS (NE/FE)</label>
                                    <input type="text" class="form-control @error('data9.min_losnefe') is-invalid @enderror" id="data9-min-losnefe" placeholder="Minimum LOS (NE/FE)" wire:model.defer="data9.min_losnefe">
                                    @error('data9.min_losnefe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-los-nlos">LOS/NLOS</label>
                                    <input type="text" class="form-control @error('data9.los_nlos') is-invalid @enderror" id="data9-los-nlos" placeholder="LOS/NLOS" wire:model.defer="data9.los_nlos">
                                    @error('data9.los_nlos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-remark">Remarks</label>
                                    <input type="text" class="form-control @error('data9.remark') is-invalid @enderror" id="data9-remark" placeholder="Remarks" wire:model.defer="data9.remark">
                                    @error('data9.remark')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-tgl-drm">DRM Date</label>
                                    <input type="date" class="form-control @error('data9.tgl_drm') is-invalid @enderror" id="data9-tgl-drm" wire:model.defer="data9.tgl_drm">
                                    @error('data9.tgl_drm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-tgl-edrm">E-DRM Date</label>
                                    <input type="date" class="form-control @error('data9.tgl_edrm') is-invalid @enderror" id="data9-tgl-edrm" wire:model.defer="data9.tgl_edrm">
                                    @error('data9.tgl_edrm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data9-drm-stts">DRM Status</label>
                                    <input type="text" class="form-control @error('data9.drm_stts') is-invalid @enderror" id="data9-drm-stts" placeholder="DRM Status" wire:model.defer="data9.drm_stts">
                                    @error('data9.drm_stts')
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
