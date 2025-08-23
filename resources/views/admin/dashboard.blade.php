@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

  <div class="grid md:grid-cols-2 gap-4">
    <a href="{{ route('admin.users.index') }}" class="block p-4 rounded border hover:bg-gray-50">
      <h2 class="text-xl font-semibold">All Users</h2>
      <p class="text-sm text-gray-600">View customers and drill into bookings & payments.</p>
    </a>

    <a href="{{ route('admin.bills.index') }}" class="block p-4 rounded border hover:bg-gray-50">
      <h2 class="text-xl font-semibold">Bills / Payments</h2>
      <p class="text-sm text-gray-600">See recent payments and statuses.</p>
    </a>
  </div>
</div>
@endsection
