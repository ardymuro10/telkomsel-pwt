<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" style="margin-right: 20px" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
            <button onclick="document.getElementById('ngaploud').value = '';" class="btn btn-success" type="button" style="margin-right: 20px" wire:click="viewEasy" >Upload <i class="ml-2 fas fa-upload"></i></button>
            <a class="btn btn-info" style="margin-right: 20px" href="{{route('contoheasy')}}" >Contoh <i class="ml-2 fas fa-info-circle"></i></a>
            <button class="btn btn-warning" type="button" wire:click="download" >Download <i class="ml-2 fas fa-download"></i></button>
        </div>
        <div class="card-body">
            <div>
                <livewire:data.easy-pole.datatable />
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-easypole" tabindex="-1" role="dialog" aria-labelledby="delete-easypole-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-easypole-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $easypole['id'] ?? null }})">
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

    <div class="modal fade" id="edit-easypole" tabindex="-1" role="dialog" aria-labelledby="edit-easypole-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-easypole-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $easypole['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-area">Area</label>
                                    <input type="text" class="form-control @error('easypole.area') is-invalid @enderror" id="easypole-area" placeholder="Area" wire:model.defer="easypole.area">
                                    @error('easypole.area')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-region">Region</label>
                                    <input type="text" class="form-control @error('easypole.region') is-invalid @enderror" id="easypole-region" placeholder="Region" wire:model.defer="easypole.region">
                                    @error('easypole.region')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-site-id">Site Id (BBU)</label>
                                    <input type="text" class="form-control @error('easypole.site_id') is-invalid @enderror" id="easypole-site-id" placeholder="Site Id (BBU)" wire:model.defer="easypole.site_id">
                                    @error('easypole.site_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-site-name">Site Name (BBU)</label>
                                    <input type="text" class="form-control @error('easypole.site_name') is-invalid @enderror" id="easypole-site-name" placeholder="Site Name (BBU)" wire:model.defer="easypole.site_name">
                                    @error('easypole.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-lat">Lat (BBU)</label>
                                    <input type="text" class="form-control @error('easypole.lat') is-invalid @enderror" id="easypole-lat" placeholder="Lat (BBU)" wire:model.defer="easypole.lat">
                                    @error('easypole.lat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-long">Long (BBU)</label>
                                    <input type="text" class="form-control @error('easypole.long') is-invalid @enderror" id="easypole-long" placeholder="Long (BBU)" wire:model.defer="easypole.long">
                                    @error('easypole.long')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-site-id-pole">Site Id (Pole)</label>
                                    <input type="text" class="form-control @error('easypole.site_id_pole') is-invalid @enderror" id="easypole-site-id-pole" placeholder="Site Id (Pole)" wire:model.defer="easypole.site_id_pole">
                                    @error('easypole.site_id_pole')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-site-name-pole">Site Name (Pole)</label>
                                    <input type="text" class="form-control @error('easypole.site_name_pole') is-invalid @enderror" id="easypole-site-name-pole" placeholder="Site Name (Pole)" wire:model.defer="easypole.site_name_pole">
                                    @error('easypole.site_name_pole')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-lat-pole">Lat (Pole)</label>
                                    <input type="text" class="form-control @error('easypole.lat_pole') is-invalid @enderror" id="easypole-lat-pole" placeholder="Lat (Pole)" wire:model.defer="easypole.lat_pole">
                                    @error('easypole.lat_pole')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-long-pole">Long (Pole)</label>
                                    <input type="text" class="form-control @error('easypole.long_pole') is-invalid @enderror" id="easypole-long-pole" placeholder="Long (Pole)" wire:model.defer="easypole.long_pole">
                                    @error('easypole.long_pole')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-type-easypole">Type Easy Pole</label>
                                    <input type="text" class="form-control @error('easypole.type_easypole') is-invalid @enderror" id="easypole-type-easypole" placeholder="Type Easy Pole" wire:model.defer="easypole.type_easypole">
                                    @error('easypole.type_easypole')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-propose-mitra-pole">Propose Mitra Pole</label>
                                    <input type="text" class="form-control @error('easypole.propose_mitra_pole') is-invalid @enderror" id="easypole-propose-mitra-pole" placeholder="Propose Mitra Pole" wire:model.defer="easypole.propose_mitra_pole">
                                    @error('easypole.propose_mitra_pole')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-propose-mitra-fo">Propose Mitra FO</label>
                                    <input type="text" class="form-control @error('easypole.propose_mitra_fo') is-invalid @enderror" id="easypole-propose-mitra-fo" placeholder="Propose Mitra FO" wire:model.defer="easypole.propose_mitra_fo">
                                    @error('easypole.propose_mitra_fo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-komit-revreg">Komitment Revenue Regional</label>
                                    <input type="text" class="form-control @error('easypole.komit_revreg') is-invalid @enderror" id="easypole-komit-revreg" placeholder="Komitment Revenue Regional" wire:model.defer="easypole.komit_revreg">
                                    @error('easypole.komit_revreg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-avg-revsur">Avg Revenue Surrounding (1'st tier)</label>
                                    <input type="text" class="form-control @error('easypole.avg_revsur') is-invalid @enderror" id="easypole-avg-revsur" placeholder="Avg Revenue Surrounding (1'st tier)" wire:model.defer="easypole.avg_revsur">
                                    @error('easypole.avg_revsur')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-rev-shifa">Revenue Shifa</label>
                                    <input type="text" class="form-control @error('easypole.rev_shifa') is-invalid @enderror" id="easypole-rev-shifa" placeholder="Revenue Shifa" wire:model.defer="easypole.rev_shifa">
                                    @error('easypole.rev_shifa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-dis-poletobbu">Distance Pole to BBU</label>
                                    <input type="text" class="form-control @error('easypole.dis_poletobbu') is-invalid @enderror" id="easypole-dis-poletobbu" placeholder="Distance Pole to BBU" wire:model.defer="easypole.dis_poletobbu">
                                    @error('easypole.dis_poletobbu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-dis-poletosite">Distance Pole to Site Terdekat</label>
                                    <input type="text" class="form-control @error('easypole.dis_poletosite') is-invalid @enderror" id="easypole-dis-poletosite" placeholder="Distance Pole to Site Terdekat" wire:model.defer="easypole.dis_poletosite">
                                    @error('easypole.dis_poletosite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-front-hauldis">Front Haul Distance</label>
                                    <input type="text" class="form-control @error('easypole.front_hauldis') is-invalid @enderror" id="easypole-front-hauldis" placeholder="Front Haul Distance" wire:model.defer="easypole.front_hauldis">
                                    @error('easypole.front_hauldis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-objective">Objective</label>
                                    <input type="text" class="form-control @error('easypole.objective') is-invalid @enderror" id="easypole-objective" placeholder="Objective" wire:model.defer="easypole.objective">
                                    @error('easypole.objective')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="easypole-priority">Priority</label>
                                    <input type="text" class="form-control @error('easypole.priority') is-invalid @enderror" id="easypole-priority" placeholder="Priority" wire:model.defer="easypole.priority">
                                    @error('easypole.priority')
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

    <div class="modal fade" id="import-easypole" tabindex="-1" role="dialog" aria-labelledby="import-easypole-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="import-easypole-label">Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="easyImport">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">File Excel</label>
                                <input id="ngaploud" type="file" class="form-control @error('file') is-invalid @enderror" wire:model="file">
                                <small style="font-style: italic"><b class="text-danger">*</b> format file harus .xlsx .xls</small>
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

