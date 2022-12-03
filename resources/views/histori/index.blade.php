@extends('layout')

@section('content')

<h4 class="bg-primary text-white p-3 mt-4 rounded-3">Tabel Riwayat Stok Obat</h4>
<a href="{{ route('histori.create') }}" type="button" class="btn btn-secondary rounded-3 mb-2">Tambah Riwayat</a>
<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Histori Stok Obat</th>
        <th>ID Obat</th>
        <th>ID Unit Kerja</th>
        <th>Jumlah</th>
        <th>Tanggal Stok</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_histori_stok_obat }}</td>
                <td>{{ $data->id_obat }}</td>
                <td>{{ $data->id_unit_kerja }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>{{ $data->tgl_stok }}</td>
                <td>
                    <a 
                    {{-- href="{{ route('admin.edit', $data->id_admin) }}"  --}}
                    type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_histori_stok_obat }}">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_histori_stok_obat }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" 
                                {{-- action="{{ route('admin.delete', $data->id_admin) }}" --}}
                                >
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



@stop