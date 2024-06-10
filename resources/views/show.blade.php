@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('styles.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Room Details</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $chambre->id }}</td>
        </tr>
        <tr>
            <th>Number</th>
            <td>{{ $chambre->number }}</td>
        </tr>
        <tr>
            <th>Floor</th>
            <td>{{ $chambre->floor }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $chambre->category->title }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $chambre->price }}</td>
        </tr>
    </table>

    <a href="{{ route('chambres.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
