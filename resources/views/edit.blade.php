@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('styles.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Edit Room</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chambres.update', $chambre) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="number">Number</label>
            <input type="text" name="number" class="form-control" value="{{ old('number', $chambre->number) }}">
        </div>

        <div class="form-group">
            <label for="floor">Floor</label>
            <input type="number" name="floor" class="form-control" value="{{ old('floor', $chambre->floor) }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $chambre->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{ old('price', $chambre->price) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
