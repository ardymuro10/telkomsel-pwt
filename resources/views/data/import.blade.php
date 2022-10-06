<div>
    <x-flash-message/>

    <form wire:submit.prevent="submit">
        <div class="card">
            <div class="card-header">
                <h4 class="h4" id="">Import file</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">File Excel</label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" wire:model="file">
                    <small style="font-style: italic">Format file harus .xlsx .xls</small>
                    @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('contoh')}}" class="btn btn-info" style="margin-right: 15px">Contoh</a>
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>
</div>
