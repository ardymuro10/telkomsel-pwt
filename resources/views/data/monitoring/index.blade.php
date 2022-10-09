<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <div>
                <livewire:data.monitoring.datatable />
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-monitoring" tabindex="-1" role="dialog" aria-labelledby="delete-monitoring-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-monitoring-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $monitoring['id'] ?? null }})">
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

    <div class="modal fade" id="edit-monitoring" tabindex="-1" role="dialog" aria-labelledby="edit-monitoring-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-monitoring-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $monitoring['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="monitoring-site-id">Site Id</label>
                                    <input type="text" class="form-control @error('monitoring.site_id') is-invalid @enderror" id="monitoring-site-id" placeholder="Site Id" wire:model.defer="monitoring.site_id">
                                    @error('monitoring.site_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monitoring-type-infra">Type Infra</label>
                                    <select class="form-control @error('monitoring.type_infra') is-invalid @enderror" id="monitoring-type-infra" wire:model.defer="monitoring.type_infra">
                                        <option value="">Pilih</option>
                                        <option value="easy pole">{{ Str::title('easy pole') }}</option>
                                        <option value="black site">{{ Str::title('black site') }}</option>
                                        <option value="repeater">{{ Str::title('repeater') }}</option>
                                    </select>
                                    @error('monitoring.type_infra')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="monitoring-owner-infra">Owner Infra</label>
                                    <input type="text" class="form-control @error('monitoring.owner_infra') is-invalid @enderror" id="monitoring-owner-infra" placeholder="Owner Infra" wire:model.defer="monitoring.owner_infra">
                                    @error('monitoring.owner_infra')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monitoring-status">Status</label>
                                    <select class="form-control @error('monitoring.status') is-invalid @enderror" id="monitoring-status" wire:model.defer="monitoring.status">
                                        <option value="">Pilih</option>
                                        <option value="open">{{ Str::title('open') }}</option>
                                        <option value="on progres">{{ Str::title('on progres') }}</option>
                                        <option value="close">{{ Str::title('close') }}</option>
                                    </select>
                                    @error('monitoring.status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="monitoring-vendor">Vendor</label>
                                    <input type="text" class="form-control @error('monitoring.vendor') is-invalid @enderror" id="monitoring-vendor" placeholder="Vendor" wire:model.defer="monitoring.vendor">
                                    @error('monitoring.vendor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="monitoring-list-program">List Program</label>
                                    <textarea rows="3" class="form-control @error('monitoring.list_program') is-invalid @enderror" id="monitoring-list-program" placeholder="List Program" wire:model.defer="monitoring.list_program"></textarea>
                                    @error('monitoring.list_program')
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
