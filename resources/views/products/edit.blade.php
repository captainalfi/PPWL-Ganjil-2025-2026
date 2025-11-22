@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow p-6 space-y-6">
    <div>
        <h1 class="text-xl font-semibold text-slate-800">Edit Product</h1>
        <p class="text-sm text-slate-500">Update product information and its category.</p>
    </div>

    <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Category --}}
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Category</label>
            <select name="category_id"
                    class="w-full rounded-lg border-slate-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id', $product->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Name</label>
            <input type="text" name="name"
                   value="{{ old('name', $product->name) }}"
                   class="w-full rounded-lg border-slate-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('name')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Price --}}
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Price</label>
            <input type="number" step="0.01" name="price"
                   value="{{ old('price', $product->price) }}"
                   class="w-full rounded-lg border-slate-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('price')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
            <textarea name="description" rows="3"
                      class="w-full rounded-lg border-slate-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between pt-2">
            <a href="{{ route('products.index') }}"
               class="text-sm text-slate-600 hover:text-slate-800">
                ← Back to Products
            </a>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700">
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection
