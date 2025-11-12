@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Create Category</h1>

    <form method="POST" action="{{ route('categories.store') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full rounded border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
            @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded border">Cancel</a>
            <button class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
