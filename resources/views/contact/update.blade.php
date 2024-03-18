@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form method="POST" action="{{ route('contact.update', $contact) }}" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Firstname <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="firstname" value="{{ old('firstname', $contact->firstname) }}" />
            </div>
            <div class="mb-3">
                <label>Lastname <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lastname" value="{{ old('lastname') }}" />
            </div>
            <div class="mb-3">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-3">
                <label>Phone<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('contact') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection