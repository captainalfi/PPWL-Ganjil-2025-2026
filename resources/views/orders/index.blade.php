@extends('layouts.user')

@section('title', 'My Orders')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <div>
        <h1 class="text-2xl font-semibold text-slate-800">My Orders</h1>
        <p class="text-sm text-slate-500">Riwayat pesanan produk yang telah kamu checkout.</p>
    </div>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 border-b">
                <tr>
                    <th class="px-4 py-3 text-left">#</th>
                    <th class="px-4 py-3 text-left">Product</th>
                    <th class="px-4 py-3 text-right">Price</th>
                    <th class="px-4 py-3 text-right">Qty</th>
                    <th class="px-4 py-3 text-right">Total</th>
                    <th class="px-4 py-3 text-left">Order Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    @foreach($order->items as $item)
                        <tr class="border-b last:border-0">
                            <td class="px-4 py-3">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->product->name }}
                            </td>
                            <td class="px-4 py-3 text-right">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-right">
                                {{ $item->quantity }}
                            </td>
                            <td class="px-4 py-3 text-right font-semibold">
                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm text-slate-500">
                                {{ $order->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-slate-500">
                            Belum ada pesanan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
