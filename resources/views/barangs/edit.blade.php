@extends('barangs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Barang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('barangs.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <div class="row">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ID Barang:</strong>
                                <input type="text" name="id" value="{{ $barang->id }}" class="form-control"
                                    placeholder="ID Barang">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama Barang:</strong>
                                <input type="text" name="nama_bar" value="{{ $barang->nama_bar }}" class="form-control"
                                    placeholder="Nama Barang">
                            </div>
                        </div>
                        <br>
                        <br>
                        <strong>Pilih Merek</strong>
                        <select class="form-control" id="merek" name="merek" required="merek">
                            <option value="merek" selected disabled>{{ $barang->merek }}</option>
                            @foreach ($merek as $cr)
                                <option value="{{ $cr->nama }}">{{ $cr->nama }}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <strong>Pilih Distributor</strong>
                        <select class="form-control" id="distributor" name="nama_dis" required="nama_dis">
                            <option value="nama_dis" selected disabled>{{ $barang->nama_dis }}</option>
                            @foreach ($distributor as $dists)
                                <option value="{{ $dists->nama_dis }}">{{ $dists->nama_dis }}</option>
                            @endforeach
                        </select>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Harga Barang:</strong>
                                <input type="text" name="harga_bar" value="{{ $barang->harga_bar }}"
                                    class="form-control" placeholder="Harga Barang">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Harga Beli:</strong>
                                <input type="text" name="harga_bel" value="{{ $barang->harga_bel }}"
                                    class="form-control" placeholder="Harga Beli">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jumlah Stok:</strong>
                                <input type="text" name="stok" value="{{ $barang->stok }}" class="form-control"
                                    placeholder="Jumlah Stok">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama Petugas :</strong>
                                <input type="text" name="nama_pet" value="{{ $barang->nama_pet }}" class="form-control"
                                    placeholder="Nama Petugas">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
