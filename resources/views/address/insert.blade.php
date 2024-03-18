@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('address.insert') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Street <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="street" value="{{ old('street') }}" />
            </div>
            <div class="mb-3">
                <label>City <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="city" value="{{ old('city') }}" />
            </div>
            <div class="mb-3">
                <label>Province <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="province" value="{{ old('province') }}" />
            </div>
            <div class="mb-3">
                <label>Country<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="country" value="{{ old('country') }}" />
            </div>
            <div class="mb-3">
                <label>Postal Code<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="postal_code" value="{{ old('postal_code') }}" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('address') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection