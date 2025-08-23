@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">My Bills</h1>
  <table class="w-full border">
    <thead>
      <tr class="bg-gray-100">
        <th class="p-3 text-left">ID</th>
        <th class="p-3 text-left">Booking</th>
        <th class="p-3 text-left">Amount</th>
        <th class="p-3 text-left">Status</th>
        <th class="p-3 text-left">Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($rows as $r)
        <tr class="border-t">
          <td class="p-3">{{ $r->id }}</td>
          <td class="p-3">{{ $r->booking_id ? '#'.$r->booking_id : '—' }}</td>
          <td class="p-3">{{ $r->amount ?? '—' }}</td>
          <td class="p-3">{{ $r->status ?? '—' }}</td>
          <td class="p-3">{{ $r->created_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-4">{{ $rows->links() }}</div>
</div>
@endsection
