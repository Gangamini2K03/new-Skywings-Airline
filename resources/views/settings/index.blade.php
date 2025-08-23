@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">Settings</h1>
  <ul class="list-disc ml-6 space-y-2">
    <li><a class="underline" href="{{ route('profile.edit') }}">Profile</a></li>
    <li><a class="underline" href="{{ route('password.edit') }}">Password</a></li>
    <li><a class="underline" href="{{ route('appearance') }}">Appearance</a></li>
  </ul>
</div>
@endsection
