@extends('app')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="container">
    <div class="mb-3">
        <form>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="q" value="{{ $q }}" placeholder="Search Here...">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success btn-sm">Refresh</button>
                </div>
            </div>
        </form>
    </div>
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('address.insertview') }}">Tambah Data</a>
    </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Street</th>
        <th scope="col">City</th>
        <th scope="col">Province</th>
        <th scope="col">Country</th>
        <th scope="col">Postal Code</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        @foreach($addresss as $address)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $address->street }}</td>
            <td>{{ $address->city }}</td>
            <td>{{ $address->province }}</td>
            <td>{{ $address->country }}</td>
            <td>{{ $address->postal_code }}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('login') }}">Edit</a>
                <a class="btn btn-danger btn-sm" href="{{ route('login') }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection