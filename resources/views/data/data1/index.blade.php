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
                <table class="table-bordered col-12" cellpadding="10">
                    <thead style="text-align: center">
                        <tr>
                            <th>Id</th>
                            <th>Unik</th>
                            <th>Unik Koordinat</th>
                            <th>Id Site</th>
                            <th>Site Name</th>
                            <th>Lat</th>
                            <th>Long</th>
                            <th>Special Program JPP</th>
                            <th>Objective</th>
                            <th>SOW</th>
                            <th>Program JPP 2023</th>
                            <th>Program JPP 2023 Simple</th>
                            <th>Program JPP 2023</th>
                            <th>Program JPP 2023 Simple</th>
                            <th>Program JPP 2023</th>
                            <th>Program JPP 2023 Simple</th>
                            <th>Program JPP 2023</th>
                            <th>Program JPP 2023 Simple</th>
                            <th>Program JPP 2023</th>
                            <th>Program JPP 2023 Simple</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data2s as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->unik }}</td>
                            <td>{{ $data->unik_krdnt }}</td>
                            <td>{{ $data->id_site }}</td>
                            <td>{{ $data->site_name }}</td>
                            <td>{{ $data->lat }}</td>
                            <td>{{ $data->long }}</td>
                            <td>{{ $data->sp_prog_jpp }}</td>
                            <td>{{ $data->objective }}</td>
                            <td>{{ $data->sow }}</td>
                            <td>{{ $data->prog_jpp }}</td>
                            <td>{{ $data->prog_jppsimple }}</td>
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
