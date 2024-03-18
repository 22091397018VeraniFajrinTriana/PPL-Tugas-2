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
        <a class="btn btn-primary" href="{{ route('contact.insertview') }}">Tambah Data</a>
    </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $contact->firstname }}</td>
            <td>{{ $contact->lastname }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <!-- <a class="btn btn-warning btn-sm" href="{{ route('contact.updateview', ['contact_id' => $contact]) }}">Edit</a> -->
                <form method="POST" action="{{ route('contact.delete', $contact) }}" style="display: inline" onsubmit="return confirm('Apakah anda yakin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection