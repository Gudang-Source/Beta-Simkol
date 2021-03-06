@extends('template.temp')

@section('content')

<div class="card col-lg-12">
    <div class="card-body">
        <h4 class="card-title">Data Tabel Mata Pelajaran</h4>
        <div class="table-responsive m-t-40">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span> </button>
            </div>
            @endif
            <div class="row button-group">
                <div class="col-lg-2 col-md-4">
                    <a href="{{ route('mata-pelajaran.create') }}" class="btn btn-rounded btn-block btn-info">Tambah</a>
                </div>
            </div>

            <table id="myTable" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Mata Pelajaran</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @php
                $no=1;
                @endphp
                @foreach ($mapel as $t)

                <tbody>
                    <tr>
                        <td>{{$no++}}.</td>
                        <td>{{$t->mp_nama}}</td>
                        <td>{{$t->mp_ket}}</td>
                        <td class="datatable-ct">
                            <a href="{{ route('mata-pelajaran.edit', $t->mp_id) }}" class="btn btn-info">Edit</a>
                            <form method="POST" action="{{ route('mata-pelajaran.destroy', $t->mp_id)}}" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</a></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
