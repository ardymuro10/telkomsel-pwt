<div>
    <x-flash-message/>

    <form wire:submit.prevent="submit">
        <div class="card">
            {{-- <div class="card-header">
                <h4 class="h4" id="">Import file</h4>
            </div> --}}
            <div class="card-body">
                <div class="mb-3">
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
            <div class="card-footer">
                <a href="{{route('contoh')}}" class="btn btn-info" style="margin-right: 20px">Contoh</a>
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button onclick="document.getElementById('ngaploud').value = '';" type="submit" class="btn btn-success" style="margin-right: 20px">Upload</button>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Export File</label>
                    <div>
                        <button type="button" class="btn btn-warning text-white" wire:click="export">Download</button>
                    </div>
                    <div>
                        <small style="font-style: italic"><b class="text-danger">*</b> file terdownload dengan format .xlsx</small>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
