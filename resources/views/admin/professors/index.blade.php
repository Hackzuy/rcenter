@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white shadow-md rounded-lg">
                <div
                    class="px-6 py-4 bg-gray-100 border-b border-gray-200 font-bold uppercase text-sm text-gray-600 rounded-t-lg">
                    {{ __('Professors') }}</div>
                <div class="p-6">
                    <a href="{{ route('admin.professors.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-8 inline-block">Add
                        Professor</a>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="w-full text-left table-auto">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6">Name</th>
                                <th class="py-3 px-6">Email</th>
                                <th class="py-3 px-6">Department</th>
                                <th class="py-3 px-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            @foreach ($professors as $professor)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-4 px-6">{{ $professor->name }}</td>
                                    <td class="py-4 px-6">{{ $professor->email }}</td>
                                    <td class="py-4 px-6">{{ $professor->department }}</td>
                                    <td class="py-4 px-6 flex items-center">
                                        <a href="{{ route('admin.professors.edit', $professor) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-8 rounded text-xs mr-2">Edit</a>
                                        <form action="{{ route('admin.professors.destroy', $professor) }}" method="POST"
                                            >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-600  text-white font-bold py-3 px-8 rounded text-xs"
                                                onclick="return confirm('Are you sure you want to delete this professor?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
