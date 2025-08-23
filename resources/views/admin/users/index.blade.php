@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">All Users</h1>

  <form method="GET" class="mb-4">
    <input type="text" name="q" value="{{ $q }}" placeholder="Search name or email" class="border p-2 rounded w-64">
    <button class="px-3 py-2 bg-blue-600 text-white rounded">Search</button>
  </form>

  <table class="w-full border">
    <thead>
      <tr class="bg-gray-100">
        <th class="p-3 text-left">ID</th>
        <th class="p-3 text-left">Name</th>
        <th class="p-3 text-left">Email</th>
        <th class="p-3"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $u)
      <tr class="border-t">
        <td class="p-3">{{ $u->id }}</td>
        <td class="p-3">{{ $u->name }}</td>
        <td class="p-3">{{ $u->email }}</td>
        <td class="p-3">
          <a class="text-blue-700 underline" href="{{ route('admin.users.show', $u->id) }}">View</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">{{ $users->links() }}</div>
</div>
@endsection
