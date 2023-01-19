@extends('barangs.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Daftar Barang</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('barangs.create') }}"> Masukan Barang Baru</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th width="120px">ID Barang</th>
                <th width="120px">Nama Barang</th>
                <th width="120px">Nama Merek</th>
                <th width="120px">Nama Distributor</th>
                <th width="120px">Harga Barang</th>
                <th width="120px">Harga Beli</th>
                <th width="120px">Jumlah Stok</th>
                <th width="120px">Nama Petugas</th>
                <th width="120px">Waktu Masuk</th>
                <th width="310px">Action</th>
            </tr>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->nama_bar }}</td>
                    <td>{{ $barang->merek }}</td>
                    <td>{{ $barang->nama_dis }}</td>
                    <td>{{ $barang->harga_bar }}</td>
                    <td>{{ $barang->harga_bel }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->nama_pet }}</td>
                    <td>{{ $barang->waktu }}</td>
                    <td>
                        <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('barangs.show', $barang->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('barangs.edit', $barang->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin mau menghapus {{ $barang->nama_bar }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $barangs->links() !!}
    </div>
@endsection
