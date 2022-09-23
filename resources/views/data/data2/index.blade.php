<div>
    <x-flash-message />
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" type="button">Tambah <i class="ml-2 fas fa-plus"></i></button>
            <input wire:model="search" type="search" id="inputPassword5" name="search" class="form-control mt-2 col-2" placeholder="Search">
        </div>
        <div class="card-body overflow-auto">
            {{-- <livewire:data.data2.index/> --}}
            <div>
                <table class="table-bordered col-12">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data2s as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
