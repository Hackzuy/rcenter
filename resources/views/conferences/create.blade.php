@extends('layouts.app')

@section('content')
    <h1>Create Conference</h1>

    <form action="{{ route('conferences.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea><br>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date" required><br>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date" required><br>

        <button type="submit">Create</button>
    </form>
@endsection