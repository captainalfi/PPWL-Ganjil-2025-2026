@extends('layouts.admin') {{-- atau layouts.app kalau kamu belum punya admin layout --}}

@section('title', 'Categories')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Categories</h1>
        <a href="{{ route('categories.create') }}" class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
            + New Category
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded bg-green-50 text-green-800 px-4 py-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Created</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $cat)
                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $loop->iteration + ($categories->currentPage()-1)*$categories->perPage() }}</td>
                        <td class="px-4 py-3 font-medium">{{ $cat->name }}</td>
                        <td class="px-4 py-3 text-gray-500 text-sm">{{ $cat->created_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('categories.edit', $cat) }}" class="px-3 py-1 rounded border border-indigo-600 text-indigo-600 hover:bg-indigo-50">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('categories.destroy', $cat) }}" onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 rounded border border-red-600 text-red-600 hover:bg-red-50">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">No categories yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
