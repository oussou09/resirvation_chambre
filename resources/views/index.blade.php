@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('styles.css') }}">
@endsection

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1>List of Rooms</h1>
    <a href="{{ route('chambres.create') }}" class="btn btn-primary">Add Room</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Number</th>
                <th>Floor</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chambres as $chambre)
                <tr>
                    <td>{{ $chambre->id }}</td>
                    <td>{{ $chambre->number }}</td>
                    <td>{{ $chambre->floor }}</td>
                    <td>{{ $chambre->category->title }}</td>
                    <td>{{ $chambre->price }}</td>
                    <td>
                        <a href="{{ route('chambres.show', $chambre) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('chambres.edit', $chambre) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('chambres.destroy', $chambre) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $chambres->links() }}
</div>
@endsection
