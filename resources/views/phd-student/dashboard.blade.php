@extends('layouts.app')
@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">PhD Student Dashboard</h1>
        <div class="rounded px-8 pt-6 pb-8 mb-8">
            <h2 class="text-2xl font-bold mb-4">Submit Research Paper</h2>
            <form action="{{ route('phd-student.submit-paper') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="title">Title:</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="title" id="title" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="abstract">Abstract:</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="abstract" id="abstract" rows="4" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="file">File:</label>
                    <input
                        class="bg-white shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="file" name="file" id="file" required>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="rounded px-8 pt-6 pb-8">
            <h2 class="text-2xl font-bold mb-4">My Research Papers</h2>
            @if ($researchPapers->count() > 0)
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Title</th>
                                <th class="py-3 px-6 text-left">Abstract</th>
                                <th class="py-3 px-6 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($researchPapers as $paper)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="font-medium">{{ $paper->title }}</div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="truncate max-w-xs">{{ $paper->abstract }}</div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="rounded-full text-xs">{{ $paper->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-700">No research papers found.</p>
            @endif
        </div>
    </div>
@endsection