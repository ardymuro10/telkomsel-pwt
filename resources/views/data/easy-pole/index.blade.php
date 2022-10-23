<div>
    <x-flash-message/>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button" style="margin-right: 20px" wire:click="addAction" >Tambah <i class="ml-2 fas fa-plus"></i></button>
            <button class="btn btn-success" type="button" style="margin-right: 20px" wire:click="upload" >Upload <i class="ml-2 fas fa-upload"></i></button>
            <a class="btn btn-info" style="margin-right: 20px" href="{{route('contoheasy')}}" >Contoh <i class="ml-2 fas fa-info-circle"></i></a>
            <button class="btn btn-warning" type="button" wire:click="" >Download <i class="ml-2 fas fa-download"></i></button>
        </div>
        <div class="card-body">
            <div>
                <livewire:data.easy-pole.datatable />
            </div>
        </div>
    </div>

</div>
