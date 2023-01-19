@extends('penggunas.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Daftar Petugas</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('penggunas.create') }}"> Masukan User Baru</a>
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
                <th widht="60px">No</th>
                <th width="120px">Nama Petugas</th>
                <th width="120px">Username</th>
                <th width="120px">Password</th>
                <th width="120px">Role</th>

            </tr>
            @foreach ($penggunas as $pengguna)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $pengguna->nama_pet }}</td>
                    <td>{{ $pengguna->username }}</td>
                    <td>{{ $pengguna->password }}</td>
                    <td>{{ $pengguna->role }}</td>
                    <td>
                        <form action="{{ route('penggunas.destroy', $pengguna->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('penggunas.show', $pengguna->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('penggunas.edit', $pengguna->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin mau menghapus {{ $pengguna->nama_pet }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $penggunas->links() !!}
    </div>
@endsection
