@extends('layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Riwayat</h5>

		<form method="post" action="{{ route('histori.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_histori_stok_obat" class="form-label">ID Histori Obat</label>
                <input type="text" class="form-control" id="id_histori_stok_obat" name="id_histori_stok_obat">
            </div>
			{{-- <div class="mb-3">
                <label for="id_obat" class="form-label">ID Obat</label>
                <input type="text" class="form-control" id="id_obat" name="id_obat">
            </div>
            <div class="mb-3">
                <label for="id_unit_kerja" class="form-label">ID Unit Kerja</label>
                <input type="text" class="form-control" id="id_unit_kerja" name="id_unit_kerja">
            </div> --}}
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah">
            </div>
            <div class="mb-3">
                <label for="tgl_stok" class="form-label">Tanggal Stok</label>
                <input type="text" class="form-control" id="tgl_stok" name="tgl_stok">
            </div>
            <div class="mb-3">
                <label for="dicatat_oleh" class="form-label">Dicatat oleh</label>
                <input type="text" class="form-control" id="dicatat_oleh" name="dicatat_oleh">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop