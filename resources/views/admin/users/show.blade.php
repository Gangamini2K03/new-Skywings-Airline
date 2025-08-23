@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">User #{{ $user->id }} — {{ $user->name }}</h1>
  <p class="mb-6 text-gray-600">{{ $user->email }}</p>

  <h2 class="text-xl font-semibold">Bookings</h2>
  <table class="w-full border mb-8">
    <thead><tr class="bg-gray-100"><th class="p-3 text-left">ID</th><th class="p-3 text-left">Created</th></tr></thead>
    <tbody>
      @foreach($bookings as $b)
      <tr class="border-t">
        <td class="p-3">{{ $b->id }}</td>
        <td class="p-3">{{ $b->created_at ?? $b->booked_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $bookings->links() }}

  <h2 class="text-xl font-semibold mt-8">Payments</h2>
  <table class="w-full border">
    <thead><tr class="bg-gray-100"><th class="p-3 text-left">ID</th><th class="p-3 text-left">Booking</th><th class="p-3 text-left">Amount</th><th class="p-3 text-left">Status</th><th class="p-3 text-left">Created</th></tr></thead>
    <tbody>
      @foreach($payments as $p)
      <tr class="border-t">
        <td class="p-3">{{ $p->id }}</td>
        <td class="p-3">{{ $p->booking_id ? '#'.$p->booking_id : '—' }}</td>
        <td class="p-3">{{ $p->amount ?? '—' }}</td>
        <td class="p-3">{{ $p->status ?? '—' }}</td>
        <td class="p-3">{{ $p->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $payments->links() }}
</div>
@endsection
