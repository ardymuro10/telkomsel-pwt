<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
        </div>
        <div class="card-body">
            <div>
                <livewire:data.data10.datatable />
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-data10" tabindex="-1" role="dialog" aria-labelledby="delete-data10-label" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-data10-label">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="deleteRow({{ $data10['id'] ?? null }})">
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

    <div class="modal fade" id="edit-data10" tabindex="-1" role="dialog" aria-labelledby="edit-data10-label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-data10-label">{{ $form_mode[$mode]['text'] }} Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form_mode[$mode]['action'] }}({{ $data10['id'] ?? null }})">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data10-unik">Unik</label>
                                    <input type="text" class="form-control @error('data10.unik') is-invalid @enderror" id="data10-unik" placeholder="Unik" wire:model.defer="data10.unik">
                                    @error('data10.unik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-unik-krdnt">Unik Koordinat</label>
                                    <input type="text" class="form-control @error('data10.unik_krdnt') is-invalid @enderror" id="data10-unik-krdnt" placeholder="Unik Koordinat" wire:model.defer="data10.unik_krdnt">
                                    @error('data10.unik_krdnt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-id-site">Id Site</label>
                                    <input type="text" class="form-control @error('data10.id_site') is-invalid @enderror" id="data10-id-site" placeholder="Id Site" wire:model.defer="data10.id_site">
                                    @error('data10.id_site')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-site-name">Site Name</label>
                                    <input type="text" class="form-control @error('data10.site_name') is-invalid @enderror" id="data10-site-name" placeholder="Site Name" wire:model.defer="data10.site_name">
                                    @error('data10.site_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data10-no-komkkst">No. KOM/KKST</label>
                                    <input type="text" class="form-control @error('data10.no_komkkst') is-invalid @enderror" id="data10-no-komkkst" placeholder="No. KOM/KKST" wire:model.defer="data10.no_komkkst">
                                    @error('data10.no_komkkst')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-tp-komkkst">TP</label>
                                    <input type="text" class="form-control @error('data10.tp_komkkst') is-invalid @enderror" id="data10-tp-komkkst" placeholder="TP" wire:model.defer="data10.tp_komkkst">
                                    @error('data10.tp_komkkst')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-tgl-kom">Tanggal KOM</label>
                                    <input type="date" class="form-control @error('data10.tgl_kom') is-invalid @enderror" id="data10-tgl-kom" wire:model.defer="data10.tgl_kom">
                                    @error('data10.tgl_kom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-cp-eqp">CP EQP</label>
                                    <input type="text" class="form-control @error('data10.cp_eqp') is-invalid @enderror" id="data10-cp-eqp" placeholder="CP EQP" wire:model.defer="data10.cp_eqp">
                                    @error('data10.cp_eqp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-pre-sales">Pre Sales</label>
                                    <input type="text" class="form-control @error('data10.pre_sales') is-invalid @enderror" id="data10-pre-sales" placeholder="Pre Sales" wire:model.defer="data10.pre_sales">
                                    @error('data10.pre_sales')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-aging">Aging</label>
                                    <input type="text" class="form-control @error('data10.aging') is-invalid @enderror" id="data10-aging" placeholder="Aging" wire:model.defer="data10.aging">
                                    @error('data10.aging')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-batch-final">Batch Final</label>
                                    <input type="text" class="form-control @error('data10.batch_final') is-invalid @enderror" id="data10-batch-final" placeholder="Batch Final" wire:model.defer="data10.batch_final">
                                    @error('data10.batch_final')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-prog-sim">Progress (Simple)</label>
                                    <input type="text" class="form-control @error('data10.prog_sim') is-invalid @enderror" id="data10-prog-sim" placeholder="Progress (Simple)" wire:model.defer="data10.prog_sim">
                                    @error('data10.prog_sim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-need-supp">Need Support ke Management</label>
                                    <input type="text" class="form-control @error('data10.need_supp') is-invalid @enderror" id="data10-need-supp" placeholder="Need Support ke Management" wire:model.defer="data10.need_supp">
                                    @error('data10.need_supp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="data10-detail-prog">Detail Progress (Dari Project Deployment)</label>
                                    <input type="text" class="form-control @error('data10.detail_prog') is-invalid @enderror" id="data10-detail-prog" placeholder="Detail Progress (Dari Project Deployment)" wire:model.defer="data10.detail_prog">
                                    @error('data10.detail_prog')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-need-form">Need Form Survey</label>
                                    <input type="text" class="form-control @error('data10.need_form') is-invalid @enderror" id="data10-need-form" placeholder="Need Form Survey" wire:model.defer="data10.need_form">
                                    @error('data10.need_form')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data10-remark-rep">Remark</label>
                                    <input type="text" class="form-control @error('data10.remark_rep') is-invalid @enderror" id="data10-remark-rep" placeholder="Remark" wire:model.defer="data10.remark_rep">
                                    @error('data10.remark_rep')
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
