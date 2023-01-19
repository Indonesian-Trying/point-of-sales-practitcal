@extends('transaksis.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Daftar transaksi</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('transaksis.create') }}"> Daftarkan Transaksi Baru</a>
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
                <th width="120px">Nama Barang</th>
                <th width="120px">Harga Barang</th>
                <th width="120px">Total Barang</th>
                <th width="120px">Total Harga</th>
                <th width="120px">Total Bayar</th>
                <th width="120px">Kembalian</th>
                <th width="120px">Tanggal Beli</th>
                <th width="310px">Action</th>
            </tr>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $transaksi->nama_bar }}</td>
                    <td>{{ $transaksi->harga_bar }}</td>
                    <td>{{ $transaksi->total_bar }}</td>
                    <td>{{ $transaksi->total_har }}</td>
                    <td>{{ $transaksi->total_bay }}</td>
                    <td>{{ $transaksi->kembalian }}</td>
                    <td>{{ $transaksi->tanggal_bel }}</td>
                    <td>
                        <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('transaksis.show', $transaksi->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('transaksis.edit', $transaksi->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin mau menghapus {{ $transaksi->nama_bar }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $transaksis->links() !!}
    </div>
@endsection
