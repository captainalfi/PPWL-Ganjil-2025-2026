@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    {{-- Header + tombol tambah --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Products</h1>
            <p class="text-sm text-slate-500">Manage product data and its category.</p>
        </div>
        <a href="{{ route('products.create') }}"
           class="inline-flex items-center px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700">
            + Add Product
        </a>
    </div>

    {{-- Search --}}
    <form method="GET" action="{{ route('products.index') }}" class="mb-4">
        <div class="flex gap-2">
            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Search by product name or category..."
                class="w-full rounded-lg border-slate-300 text-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
            >
            <button
                type="submit"
                class="px-4 py-2 rounded-lg bg-slate-900 text-white text-sm hover:bg-slate-700">
                Search
            </button>
        </div>
    </form>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel produk --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 border-b">
                <tr>
                    <th class="px-4 py-3 text-left">#</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-right">Price</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b last:border-0">
                        <td class="px-4 py-3 align-top">
                            {{ $loop->iteration + ($products->currentPage()-1) * $products->perPage() }}
                        </td>
                        <td class="px-4 py-3 align-top">
                            <div class="font-medium text-slate-800">{{ $product->name }}</div>
                            @if($product->description)
                                <div class="text-xs text-slate-500">
                                    {{ $product->description }}
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 align-top">
                            <span class="inline-flex px-2 py-1 rounded-full bg-slate-100 text-xs text-slate-700">
                                {{ $product->category?->name ?? '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 align-top text-right">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-3 align-top">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('products.edit', $product) }}"
                                   class="px-3 py-1.5 rounded-lg border border-slate-300 text-xs hover:bg-slate-50">
                                    Edit
                                </a>

                                {{-- Delete pakai SweetAlert (class js-delete-confirm) --}}
                                <form action="{{ route('products.destroy', $product) }}"
                                      method="POST"
                                      class="inline js-delete-confirm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1.5 rounded-lg border border-red-500 text-xs text-red-600 hover:bg-red-50">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-slate-500 text-sm">
                            No products found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div>
        {{ $products->withQueryString()->links() }}
    </div>
</div>
@endsection
