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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monitoring-site-id">Site Id</label>
                                    <select class="form-control @error('monitoring.site_id') is-invalid @enderror" id="monitoring-site-id" wire:model.defer="monitoring.site_id">
                                        <option value="">Pilih</option>
                                        @foreach ($data2 as $item)
                                            <option value="{{ $item->id_site }}">{{ Str::title($item->id_site) }}</option>
                                        @endforeach
                                    </select>
                                    @error('monitoring.site_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monitoring-site-name">Site Name</label>
                                    <select class="form-control @error('monitoring.site_name') is-invalid @enderror" id="monitoring-site-name" wire:model.defer="monitoring.site_name">
                                        <option value="">Pilih</option>
                                        @foreach ($data2 as $item)
                                            <option value="{{ $item->site_name }}">{{ Str::title($item->site_name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('monitoring.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monitoring-type-infra">Infra Type</label>
                                    <input type="text" class="form-control @error('monitoring.type_infra') is-invalid @enderror" id="monitoring-type-infra" placeholder="Infra Type" wire:model.defer="monitoring.type_infra">
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
                                <div class="form-group">
                                    <label for="monitoring-issue">Issue</label>
                                    <input type="text" class="form-control @error('monitoring.issue') is-invalid @enderror" id="monitoring-issue" placeholder="Issue" wire:model.defer="monitoring.issue">
                                    @error('monitoring.issue')
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
                                        <option value="have program">{{ Str::title('have program') }}</option>
                                        <option value="usulan">{{ Str::title('usulan') }}</option>
                                        <option value="on progres">{{ Str::title('on progres') }}</option>
                                        <option value="not have program">{{ Str::title('not have program') }}</option>
                                        <option value="closed">{{ Str::title('closed') }}</option>
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
