@extends('layouts.app')

@section('content')
    <h1>Conferences</h1>

    <a href="{{ route('conferences.create') }}">Create Conference</a>

    @if($conferences->count() > 0)
        <ul>
            @foreach($conferences as $conference)
                <li>
                    <strong>Name:</strong> {{ $conference->name }}<br>
                    <strong>Description:</strong> {{ $conference->description }}<br>
                    <strong>Start Date:</strong> {{ $conference->start_date }}<br>
                    <strong>End Date:</strong> {{ $conference->end_date }}<br>
                </li>
            @endforeach
        </ul>
    @else
        <p>No conferences found.</p>
    @endif
@endsection