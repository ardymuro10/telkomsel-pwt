<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <livewire:data.data3.datatable />
        </div>
    </div>

    <div class="modal fade" id="delete-data3" tabindex="-1" role="dialog" aria-labelledby="delete-data3-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-data3-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $data3['id'] ?? null }})">
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

    <div class="modal fade" id="edit-data3" tabindex="-1" role="dialog" aria-labelledby="edit-data3-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-data3-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $data3['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-unik">Unik</label>
                                    <input type="text" class="form-control @error('data3.unik') is-invalid @enderror" id="data3-unik" placeholder="Unik" wire:model.defer="data3.unik">
                                    @error('data3.unik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-unik-krdnt">Unik Koordinat</label>
                                    <input type="text" class="form-control @error('data3.unik_krdnt') is-invalid @enderror" id="data3-unik-krdnt" placeholder="Unik Koordinat" wire:model.defer="data3.unik_krdnt">
                                    @error('data3.unik_krdnt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-id-site">Id Site</label>
                                    <input type="text" class="form-control @error('data3.id_site') is-invalid @enderror" id="data3-id-site" placeholder="Id Site" wire:model.defer="data3.id_site">
                                    @error('data3.id_site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-site-name">Site Name</label>
                                    <input type="text" class="form-control @error('data3.site_name') is-invalid @enderror" id="data3-site-name" placeholder="Site Name" wire:model.defer="data3.site_name">
                                    @error('data3.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-lat">Lat</label>
                                    <input type="text" class="form-control @error('data3.lat') is-invalid @enderror" id="data3-lat" placeholder="Lat" wire:model.defer="data3.lat">
                                    @error('data3.lat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-long">Long</label>
                                    <input type="text" class="form-control @error('data3.long') is-invalid @enderror" id="data3-long" placeholder="Long" wire:model.defer="data3.long">
                                    @error('data3.long')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-sp-prog-jpp">Special Program JPP</label>
                                    <input type="text" class="form-control @error('data3.sp_prog_jpp') is-invalid @enderror" id="data3-sp-prog-jpp" placeholder="Special Program JPP" wire:model.defer="data3.sp_prog_jpp">
                                    @error('data3.sp_prog_jpp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-prog-jpp">Program JPP 2023</label>
                                    <input type="text" class="form-control @error('data3.prog_jpp') is-invalid @enderror" id="data3-prog-jpp" placeholder="Program JPP 2023" wire:model.defer="data3.prog_jpp">
                                    @error('data3.prog_jpp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-prog-jppsimple">Program JPP 2023 Simple</label>
                                    <input type="text" class="form-control @error('data3.prog_jppsimple') is-invalid @enderror" id="data3-prog-jppsimple" placeholder="Program JPP 2023 Simple" wire:model.defer="data3.prog_jppsimple">
                                    @error('data3.prog_jppsimple')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-objective">Objective</label>
                                    <input type="text" class="form-control @error('data3.objective') is-invalid @enderror" id="data3-objective" placeholder="Objective" wire:model.defer="data3.objective">
                                    @error('data3.objective')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data3-sow">SOW</label>
                                    <input type="text" class="form-control @error('data3.sow') is-invalid @enderror" id="data3-sow" placeholder="SOW" wire:model.defer="data3.sow">
                                    @error('data3.sow')
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
