@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">Bills</h1>
  <table class="w-full border-collapse">
    <thead><tr>
      <th class="border p-2 text-left">Payment #</th>
      <th class="border p-2 text-left">Customer</th>
      <th class="border p-2 text-left">Email</th>
      <th class="border p-2 text-left">Booking</th>
      <th class="border p-2 text-left">Amount</th>
      <th class="border p-2 text-left">Status</th>
      <th class="border p-2 text-left">Date</th>
    </tr></thead>
    <tbody>
    @forelse($bills as $b)
      <tr>
        <td class="border p-2">{{ $b->payment_id }}</td>
        <td class="border p-2">{{ $b->customer_name }}</td>
        <td class="border p-2">{{ $b->email }}</td>
        <td class="border p-2">{{ $b->booking_id ?? '-' }}</td>
        <td class="border p-2">{{ number_format($b->amount, 2) }}</td>
        <td class="border p-2">{{ ucfirst($b->status ?? 'paid') }}</td>
        <td class="border p-2">{{ \Carbon\Carbon::parse($b->created_at)->format('Y-m-d') }}</td>
      </tr>
    @empty
      <tr><td class="border p-2" colspan="7">No bills yet.</td></tr>
    @endforelse
    </tbody>
  </table>
</div>
@endsection
