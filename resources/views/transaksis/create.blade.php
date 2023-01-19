@extends('transaksis.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambahkan transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada input yang salah!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('transaksis.store') }}" method="POST">
        @csrf
        <br>
        <br>
        <strong>Pilih Barang</strong>
        <select class="form-control" id="nama_bar" name="nama_bar" required="nama_bar">
            <option value="--Pilih Barang Anda--" selected disabled>--Pilih Barang anda--</option>
            @foreach ($barang as $cr)
                <option value="{{ $cr->nama_bar }}">{{ $cr->nama_bar }}:[{{ $cr->stok }}]</option>
            @endforeach
        </select>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Barang:</strong>
                <div id="harga"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Barang:</strong>
                <input type="number" min="0" name="total_bar" class="form-control" placeholder="Total Barang">
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Harga:</strong>
                <input type="number" min="0" name="total_har" class="form-control" placeholder="Total Harga">
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Bayar:</strong>
                <input type="number" min="0" name="total_bay" class="form-control" placeholder="Total Bayar">
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Masukan Tanggal transaksi Masuk</strong>
                <br>
                <input type="date" id="tanggal_bel" name="tanggal_bel" value="" min="2010-01-01" max="2050-12-31">
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#nama_bar').on('change', function() {
                var namaBarang = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('getHarga') }}?nama_bar=' + namaBarang,
                    dataType: 'json',
                    success: function (response) {
                        $.each(response.hargas, function (key, item) {
                            $('#harga').empty();
                            $('#harga').append('<input class="form-control"  id="harga_bar" name="harga_bar" value="'+ item.harga_bar +'" style="cursor: not-allowed;">')
                        });
                    }
                });
            })
        });
    </script>
@endsection
